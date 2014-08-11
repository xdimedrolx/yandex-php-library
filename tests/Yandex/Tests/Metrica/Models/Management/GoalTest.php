<?php
namespace Yandex\Tests\Metrica\Models\Management;

use Guzzle\Http\Message\Response;
use Yandex\Tests\Metrica\Fixtures\Goals;
use Yandex\Tests\TestCase;
use Yandex\Metrica\Management\Models;

class GoalTest extends TestCase
{

    public function testGet()
    {
        $fixtures = Goals::$goalFixtures;

        $condition = new Models\Condition();
        $condition
            ->setUrl($fixtures['goal']['conditions'][0]['url'])
            ->setType($fixtures['goal']['conditions'][0]['type']);

        $conditions = new Models\Conditions();
        $conditions->add($condition);

        $goal = new Models\Goal();
        $goal->setId($fixtures['goal']['id'])
            ->setName($fixtures['goal']['name'])
            ->setType($fixtures['goal']['type'])
            ->setFlag($fixtures['goal']['flag'])
            ->setConditions($conditions)
            ->setClass($fixtures['goal']['class']);

        $this->assertEquals($fixtures["goal"]["id"], $goal->getId());
        $this->assertEquals($fixtures["goal"]["name"], $goal->getName());
        $this->assertEquals($fixtures["goal"]["type"], $goal->getType());
        $this->assertEquals($fixtures["goal"]["flag"], $goal->getFlag());
        $this->assertEquals($fixtures["goal"]["class"], $goal->getClass());
        $this->assertEquals($fixtures["goal"]["conditions"][0]["type"], $goal->getConditions()->getAll()[0]->getType());
        $this->assertEquals($fixtures["goal"]["conditions"][0]["url"], $goal->getConditions()->getAll()[0]->getUrl());
    }
}
 
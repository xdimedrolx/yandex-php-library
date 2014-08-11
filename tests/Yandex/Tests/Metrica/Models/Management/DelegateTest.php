<?php
namespace Yandex\Tests\Metrica\Models\Management;

use Guzzle\Http\Message\Response;
use Yandex\Tests\Metrica\Fixtures\Delegates;
use Yandex\Tests\TestCase;
use Yandex\Metrica\Management\Models;

class DelegateTest extends TestCase
{
    
    public function testGet()
    {
        $fixtures = Delegates::$delegatesFixtures;
        
        $delegate = new Models\Delegate();
        $delegate
            ->setComment($fixtures["delegates"][0]["comment"])
            ->setCreatedAt($fixtures["delegates"][0]["created_at"])
            ->setUserLogin($fixtures["delegates"][0]["user_login"]);

        $this->assertEquals($fixtures["delegates"][0]["user_login"], $delegate->getUserLogin());
        $this->assertEquals($fixtures["delegates"][0]["created_at"], $delegate->getCreatedAt());
        $this->assertEquals($fixtures["delegates"][0]["comment"], $delegate->getComment());
    }
}
 
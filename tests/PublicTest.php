<?php

namespace Vine\Tests;

use Vine\Vine;

class PublicTest extends \PHPUnit_Framework_TestCase
{
    public function testPopularTimeline()
    {
        $vine = new Vine;

        $posts = $vine->popularTimeline();
        $this->assertInternalType('array', $posts);

        // Check the response structure is as expected
        $this->assertArrayHasKey('data', $posts);
        $this->assertArrayHasKey('count', $posts['data']);
        $this->assertArrayHasKey('records', $posts['data']);
        $this->assertLessThanOrEqual($posts['data']['count'], count($posts['data']['records']));
    }
}

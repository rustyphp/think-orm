<?php
namespace app\tests;
use PHPUnit\Framework\TestCase;

/**
 * Class FirstTest
 *
 * @package app\tests
 */
class FirstTest extends TestCase {
    public function testTrue() {
        $stack=[];
        $this->assertEquals(0, count($stack));
    }
}
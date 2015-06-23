<?php

namespace Virgo\Lodash;

require_once 'MyLodash.php';

class MyLodashTest extends \PHPUnit_Framework_TestCase
{
    public function testChunk()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->chunk([1, 2, 3, 4, 5, 6, 7, 8, 9], 3);
        $this->assertEquals([[1, 2, 3], [4, 5, 6], [7, 8, 9]], $result);

        $result = $myLodash->chunk([1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 3);
        $this->assertEquals([[1, 2, 3], [4, 5, 6], [7, 8, 9], [10]], $result);


    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testChunkInvalidArguments()
    {
        $myLodash = new MyLodash();
        $result = $myLodash->chunk([], []);
    }

    public function testCompact()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->compact([0, 1, false, 2, '', 3]);
        $this->assertEquals([1 => 1, 3 => 2, 5 => 3], $result);
    }

    public function testDifference()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->difference([1, 2, 3], [4, 2]);
        $this->assertEquals([0 => 1, 2 => 3], $result);
    }

    public function testDrop()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->drop([1, 2, 3]);
        $this->assertEquals([1 => 2, 2 => 3], $result);

        $result = $myLodash->drop([1, 2, 3], 2);
        $this->assertEquals([2 => 3], $result);

        $result = $myLodash->drop([1, 2, 3], 5);
        $this->assertEquals([1 => 2, 2 => 3], $result);

        $result = $myLodash->drop([1, 2, 3], 0);
        $this->assertEquals([1, 2, 3], $result);
    }
}

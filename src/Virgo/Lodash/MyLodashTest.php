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
        $this->assertEquals([1=>1, 3=>2, 5=>3], $result);
    }
}

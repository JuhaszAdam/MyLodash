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
        $this->assertEquals([2, 3], $result);

        $result = $myLodash->drop([1, 2, 3], 2);
        $this->assertEquals([3], $result);

        $result = $myLodash->drop([1, 2, 3], 5);
        $this->assertEquals([], $result);

        $result = $myLodash->drop([1, 2, 3], 0);
        $this->assertEquals([1, 2, 3], $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDropInvalidArguments()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->drop([1, 2, 3], []);
        $result = $myLodash->drop([1, 2, 3], new \StdClass);
    }


    public function testDropRight()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->dropRight([1, 2, 3]);
        $this->assertEquals([1, 2], $result);

        $result = $myLodash->dropRight([1, 2, 3], 2);
        $this->assertEquals([1], $result);

        $result = $myLodash->dropRight([1, 2, 3], 5);
        $this->assertEquals([], $result);

        $result = $myLodash->dropRight([1, 2, 3], 0);
        $this->assertEquals([1, 2, 3], $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testDropRightInvalidArguments()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->dropRight([1, 2, 3], []);
        $result = $myLodash->dropRight([1, 2, 3], new \StdClass);
    }

    public function testDropWile()
    {
        $myLodash = new MyLodash();
        $originalArray = [
            ['user' => 'barney', 'active' => false],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => true]
        ];

        $result = $myLodash->dropWhile($originalArray, ['user' => 'barney', 'active' => false]);
        $this->assertEquals([
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => true]
        ], $result);

        $result = $myLodash->dropWhile($originalArray, 'active', false);
        $this->assertEquals([
            ['user' => 'pebbles', 'active' => true]
        ], $result);

        $result = $myLodash->dropWhile($originalArray, 'active');
        $this->assertEquals($originalArray, $result);
    }

    public function testDropRightWile()
    {
        $myLodash = new MyLodash();
        $originalArray = [
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => false]
        ];

        $result = $myLodash->dropRightWhile($originalArray, ['user' => 'pebbles', 'active' => false]);
        $this->assertEquals([
            ['user' => 'barney', 'active' => true],
            ['user' => 'fred', 'active' => false]
        ], $result);

        $result = $myLodash->dropRightWhile($originalArray, 'active', false);
        $this->assertEquals([
            ['user' => 'barney', 'active' => true]
        ], $result);

        $result = $myLodash->dropRightWhile($originalArray, 'active');
        $this->assertEquals($originalArray, $result);
    }

    public function testFill()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->fill([1, 2, 3], 'a');
        $this->assertEquals(['a', 'a', 'a'], $result);

        $result = $myLodash->fill([1, 2, 3], 2);
        $this->assertEquals([2, 2, 2], $result);

        $result = $myLodash->fill([4, 6, 8], '*', 1, 2);
        $this->assertEquals([4, '*', 8], $result);
    }

    public function testFindIndex()
    {
        $myLodash = new MyLodash();
        $originalArray = [
            ['user' => 'barney', 'active' => false],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => true]
        ];

        $result = $myLodash->findIndex($originalArray, ['user' => 'fred', 'active' => false]);
        $this->assertEquals(1, $result);

        $result = $myLodash->findIndex($originalArray, 'active', false);
        $this->assertEquals(0, $result);

        $result = $myLodash->findIndex($originalArray, 'active');
        $this->assertEquals(0, $result);

        $result = $myLodash->findIndex($originalArray, ['user' => 'fred', 'active' => true]);
        $this->assertEquals(-1, $result);
    }

    public function testFindLastIndex()
    {
        $myLodash = new MyLodash();
        $originalArray = [
            ['user' => 'barney', 'active' => false],
            ['user' => 'fred', 'active' => false],
            ['user' => 'pebbles', 'active' => true]
        ];

        $result = $myLodash->findLastIndex($originalArray, ['user' => 'fred', 'active' => false]);
        $this->assertEquals(1, $result);

        $result = $myLodash->findLastIndex($originalArray, 'active', false);
        $this->assertEquals(1, $result);

        $result = $myLodash->findLastIndex($originalArray, 'active');
        $this->assertEquals(2, $result);

        $result = $myLodash->findLastIndex($originalArray, ['user' => 'fred', 'active' => true]);
        $this->assertEquals(-1, $result);
    }

    public function testFirst()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->first([1, 2, 3]);
        $this->assertEquals(1, $result);

        $result = $myLodash->first([]);
        $this->assertEquals(null, $result);
    }

    public function testFlatten()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->flatten([1, [2, 3, [4]]]);
        $this->assertEquals([1, 2, 3, [4]], $result);

        $result = $myLodash->flatten([1, [2, 3, [4]]], true);
        $this->assertEquals([1, 2, 3, 4], $result);
    }

    public function testIndexOf()
    {
        $myLodash = new MyLodash();

        $result = $myLodash->indexOf([1, 2, 1, 2], 2);
        $this->assertEquals(1, $result);

        $result = $myLodash->indexOf([1, 2, 1, 2], 2, 2);
        $this->assertEquals(3, $result);
    }
}

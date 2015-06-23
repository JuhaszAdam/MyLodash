<?php

namespace Virgo\Lodash;

class MyLodash
{

    /**
     * @param array $array
     * @param $size
     * @return array
     */
    public function chunk(array $array, $size)
    {
        if (!is_integer($size) || $size < 1) {
            throw new \InvalidArgumentException("Second argument must be an integer with a minimum of 1!");
        }

        return array_chunk($array, $size);
    }

    /**
     * @param array $array
     * @return array
     */
    public function compact(array $array)
    {
        return array_filter($array);
    }

    /**
     * @param array $array1
     * @param array $array1
     * @return array
     */
    public function difference(array $array1, array $array2)
    {
        return array_diff($array1, $array2);
    }

    /**
     * @param array $array
     * @param int $n
     * @return array
     */
    public function drop(array $array, $n = 1)
    {
        if (!is_integer($n)) {
            throw new \InvalidArgumentException("Second argument must be an integer with a minimum of 1!");
        }

        for ($i = 0; $i < $n; $i++) {
            array_shift($array);
        }

        return $array;
    }

    /**
     * @param array $array
     * @param int $n
     * @return array
     */
    public function dropRight(array $array, $n = 1)
    {
        if (!is_integer($n)) {
            throw new \InvalidArgumentException("Second argument must be an integer with a minimum of 1!");
        }

        for ($i = 0; $i < $n; $i++) {
            array_pop($array);
        }

        return $array;
    }
}

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
}

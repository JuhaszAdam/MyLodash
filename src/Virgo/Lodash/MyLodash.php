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

    /**
     * @param array $array
     * @param mixed $predicate
     * @param null|mixed $argument
     * @return array
     */
    public function dropWhile(array $array, $predicate, $argument = null)
    {
        if (is_array($predicate)) {
            foreach ($array as $element) {
                if ($element === $predicate) {
                    array_shift($array);
                } else {
                    return $array;
                }
            }

            return $array;
        } else {
            if ($argument === null) {
                foreach ($array as $key => $element) {
                    if ($key === $predicate) {
                        array_shift($array);
                    } else {
                        return $array;
                    }
                }

                return $array;
            } else {
                foreach ($array as $key => $element) {
                    if ($element[$predicate] === $argument) {
                        array_shift($array);
                    } else {
                        return $array;
                    }
                }

                return $array;
            }
        }
    }

    /**
     * @param array $array
     * @param mixed $predicate
     * @param null|mixed $argument
     * @return array
     */
    public function dropRightWhile(array $array, $predicate, $argument = null)
    {
        $reversedArray = array_reverse($array);
        if (is_array($predicate)) {
            foreach ($reversedArray as $element) {
                if ($element === $predicate) {
                    array_pop($array);
                } else {
                    return $array;
                }
            }

            return $array;
        } else {
            if ($argument === null) {
                foreach ($reversedArray as $key => $element) {
                    if ($key === $predicate) {
                        array_pop($array);
                    } else {
                        return $array;
                    }
                }

                return $array;
            } else {
                foreach ($reversedArray as $key => $element) {
                    if ($element[$predicate] === $argument) {
                        array_pop($array);
                    } else {
                        return $array;
                    }
                }

                return $array;
            }
        }
    }
}

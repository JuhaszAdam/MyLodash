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
     * @param array $array2
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

    /**
     * @param array $array
     * @param mixed $value
     * @param int $start
     * @param null|int $end
     * @return array
     */
    public function fill(array $array, $value, $start = 0, $end = null)
    {
        if ($end === null) {
            $end = sizeof($array);
        } else {
            $array = array_replace($array, array_fill($start, $end - 1, $value));

            return $array;
        }

        $array = array_fill($start, $end, $value);

        return $array;
    }

    public function findIndex(array $array, $predicate, $argument = null)
    {
        if (is_array($predicate)) {
            foreach ($array as $key => $element) {
                if ($element === $predicate) {
                    return $key;
                }
            }
        } else {
            if ($argument === null) {
                foreach ($array as $key => $element) {
                    if (array_key_exists($predicate, $element)) {
                        return $key;
                    }
                }
            } else {
                foreach ($array as $key => $element) {
                    if ($element[$predicate] === $argument) {
                        return $key;
                    }
                }
            }
        }

        return -1;
    }

    /**
     * @param array $array
     * @param mixed $predicate
     * @param null|mixed $argument
     * @return int|string
     */
    public function findLastIndex(array $array, $predicate, $argument = null)
    {
        $found = -1;
        if (is_array($predicate)) {
            foreach ($array as $key => $element) {
                if ($element === $predicate) {
                    $found = $key;
                }
            }
        } else {
            if ($argument === null) {
                foreach ($array as $key => $element) {
                    if (array_key_exists($predicate, $element)) {
                        $found = $key;
                    }
                }
            } else {
                foreach ($array as $key => $element) {
                    if ($element[$predicate] === $argument) {
                        $found = $key;
                    }
                }
            }
        }

        return $found;
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function first(array $array)
    {
        return array_shift($array);
    }

    /**
     * @param array $array
     * @param bool $deep
     * @return array
     */
    public function flatten(array $array, $deep = false)
    {
        $result = [];
        if ($deep) {
            $result = [];
            array_walk_recursive($array, function ($a) use (&$result) {
                $result[] = $a;
            });
        } else {
            foreach ($array as $element) {
                if (is_array($element)) {
                    $result = array_merge($result, $element);
                } else {
                    array_push($result, $element);
                }
            }
        }

        return $result;
    }

    /**
     * @param array $array
     * @param mixed $value
     * @param int $from
     * @return int|mixed
     */
    public function indexOf(array $array, $value, $from = 0)
    {
        if ($from !== 0) {
            for ($i = $from; $i < sizeof($array); $i++) {
                if ($array[$i] === $value) {
                    return $i;
                }
            }
        } else {
            return array_search($value, $array);
        }
    }

    /**
     * @param array $array
     * @return array
     */
    public function initial(array $array)
    {
        array_pop($array);

        return $array;
    }

    /**
     * @param array ...$arrays
     * @return mixed
     */
    public function intersection(...$arrays)
    {
        return call_user_func_array('array_intersect', $arrays);
    }

    /**
     * @param array $array
     * @return mixed
     */
    public function last(array $array)
    {
        return array_pop($array);
    }

    /**
     * @param array $array
     * @param ...$values
     * @return array
     */
    public function pull(array $array, ...$values)
    {
        $result = [];

        foreach ($array as $element) {
            foreach ($values as $value) {
                if ($element === $value) {
                    continue(2);
                }
            }
            array_push($result, $element);
        }

        return $result;
    }

    /**
     * @param array $array
     * @param ...$values
     * @return array
     */
    public function remove(array $array, ...$values)
    {
        $result = [];

        foreach ($array as $element) {
            foreach ($values as $value) {
                if ($element === $value) {
                    array_push($result, $element);
                }
            }
        }

        return $result;
    }

    /**
     * @param array $array
     * @return array
     */
    public function rest(array $array)
    {
        array_shift($array);

        return $array;
    }

    /**
     * @param array $array
     * @param int $start
     * @param int $end
     * @return array
     */
    public function slice(array $array, $start, $end)
    {
        if ($start >= $end) {
            throw new \InvalidArgumentException("The 'end' argument must be higher than the 'start' argument!");
        }

        return array_slice($array, $start, $end - $start);
    }

    public function sortedFirstIndex(array $array, $insertValue)
    {
        foreach ($array as $key => $value) {
            if ($value >= $insertValue) {
                return $key;
            }
        }

        return -1;
    }

    /**
     * @param array $array
     * @param int $length
     * @return array
     */
    public function take(array $array, $length = 1)
    {
        if (!is_integer($length) || $length < 0) {
            throw new \InvalidArgumentException("Second argument must be an integer with a minimum of 0!");
        }

        return array_slice($array, 0, $length);
    }

    /**
     * @param array $array
     * @param int $length
     * @return array
     */
    public function takeRight(array $array, $length = 1)
    {
        if (!is_integer($length) || $length < 0) {
            throw new \InvalidArgumentException("Second argument must be an integer with a minimum of 0!");
        }

        $start = sizeof($array) - $length;
        if ($start < 0) {
            $start = 0;
        }
        return array_slice($array, $start, $length);
    }

    /**
     * @param array ...$arrays
     * @return mixed
     */
    public function union(array ...$arrays)
    {
        $result = [];
        foreach ($arrays as $array) {
            foreach ($array as $element) {
                foreach ($result as $resultElement) {
                    if ($element === $resultElement) {
                        continue(2);
                    }
                }
                array_push($result, $element);
            }
        }
        return $result;
    }

    /**
     * @param array $array
     * @param bool $flag
     * @return array
     */
    public function uniq(array $array, $flag = false)
    {
        if ($flag) {
            $flag = SORT_REGULAR;
        }
        return array_unique($array, $flag);
    }

    /**
     * @param array $array
     * @param $value
     * @return array
     */
    public function without(array $array, $value)
    {
        return array_diff($array, [$value]);
    }
}

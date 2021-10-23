<?php

namespace App;

use Illuminate\Support\Arr;

class ArrayHelper extends Arr
{
    /**
     * from
     * [
     *  keys => [a, b]
     *  values => [1, 2]
     * ]
     *
     * to
     * [
     *  a: 1
     *  c: 2
     * ]
     */
    public static function adjustArrayKeyValue(&...$arrays)
    {
       foreach ($arrays as &$array) {
           if (empty($array['keys']) || empty($array['values']) || count($array['keys']) !== count($array['values'])) {
               $array = null;
               continue;
           }

           $newArray = [];

           for ($i = 0; $i < count($array['keys']); $i++) {
               $key = trim($array['keys'][$i]);
               $value = trim($array['values'][$i]);
               if ($key && $value) {
                   $newArray[$key] = $value;
               }
           }

           $array = empty($newArray) ? null : $newArray;
       }
    }
}

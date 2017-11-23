<?php
/**
 * Created by PhpStorm.
 * User: hanshan
 * Date: 2017/1/16
 * Time: 下午5:51
 */

namespace App;


class Generator
{
    static public function getRows($file)
    {
        $handle = fopen($file, 'rb');
        if ($handle === false) {
            throw new \Exception();
        }
        while (feof($handle) === false) {
            yield fgetcsv($handle);
        }
        fclose($handle);
    }

}
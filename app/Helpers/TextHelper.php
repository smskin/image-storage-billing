<?php

if(!function_exists('convertToReadableSize')){
    function convertToReadableSize(int $size): string
    {
        $base = log($size) / log(1024);
        $suffix = array('B', 'KB', 'MB', 'GB', 'TB');
        $f_base = (int) floor($base);
        return round(1024 ** ($base - floor($base)), 1) . $suffix[$f_base];
    }
}

<?php

if (!function_exists('flashSuccess')) {
    function flashSuccess(string $message): void
    {
        Session::flash('flash-success',$message);
    }
}

if (!function_exists('flashError')) {
    function flashError(string $message): void
    {
        Session::flash('flash-error',$message);
    }
}

if (!function_exists('flashWarning')) {
    function flashWarning(string $message): void
    {
        Session::flash('flash-warning',$message);
    }
}

if (!function_exists('flashInfo')) {
    function flashInfo(string $message): void
    {
        Session::flash('flash-info',$message);
    }
}

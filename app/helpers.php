<?php
/**
 * Created by PhpStorm.
 * User: Hung
 * Date: 9/7/15
 * Time: 10:51 PM
 */

function settings($key = null)
{
    $settings = app('App\Settings');
    return $key ? $settings->get($key) : $settings;
}
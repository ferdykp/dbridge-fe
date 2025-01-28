<?php

if (!function_exists('activeRoute')) {
    function activeRoute($route)
    {
        return request()->url() === $route ? 'active' : '';
    }
}

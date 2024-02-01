<?php
use Illuminate\Support\Facades\Route;
function SetActive(array $routes)
{
    foreach ($routes as $route) {
        if (Route::is($route)) {
            return "active";
        }
    }
    
    return "";
}

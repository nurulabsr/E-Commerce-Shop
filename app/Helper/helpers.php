<?php 
function SetActive(array $route){
  
    if(is_array($route)){
        foreach($route as $r){
            if(route()->routeIs($r)){
             return "active";
            }
        }
    }
}
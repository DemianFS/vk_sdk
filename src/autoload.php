<?php

spl_autoload_register(function ($class_name) {
    require "$class_name.php";
//    require "Config/{$class_name}.php";
//    require "Modules/{$class_name}.php";
});
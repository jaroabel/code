<?php

/*
spl_autoload_register(function ($class) {
    
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
    
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    return false;
});
*/

spl_autoload_register(function ($className) {

    $fileName = "";
    $namespace = "";

    if (false !== ($lastNsPos = strripos($className, '\\'))) {

        $namespace =  ucfirst(substr($className, 0, $lastNsPos));
        $className = ucfirst(substr($className, $lastNsPos + 1));
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;

    }

    $file  = DOTS . DIRECTORY_SEPARATOR . DOTS . DOC_ROOT . DIRECTORY_SEPARATOR . $fileName . $className . '.php';

    if (file_exists($file)) {

        require_once( $file );
        return true;

    } else {

        echo 'Class "'.$className.'" does not exist. IN ==> ' . $file . ' Namespace ==> ' . $namespace . "<br>";
        return false;
        
    }
            
 });
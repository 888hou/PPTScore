<?php 
    session_start();

    function getDirContent($path){
        if(!is_dir($path)){
          return false;
        }
        //readdir方法
        /* $dir = opendir($path);
        $arr = array();
        while($content = readdir($dir)){
          if($content != '.' && $content != '..'){
            $arr[] = $content;
          }
        }
        closedir($dir); */
       
        //scandir方法
        $arr = array();
        $data = scandir($path);
        foreach ($data as $value){
          if($value != '.' && $value != '..'){
            $arr[] = $value;
          }
        }
        return $arr;
    }
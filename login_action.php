<?php
include('init.php');
if( isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] !='' && $_POST['password'] !='' )
{
    $dir = getDirContent('./users');
    if($dir){
        foreach($dir as $v){
            $arr = explode('.',$v);
            if($arr[1]=='txt' && $arr[0] != ''){
                if($arr[0] == $_POST['username']) {
                    $file = file('./users/'.$v);
                    $_password = str_replace(array("\r\n", "\r", "\n"), "", $file[0]);  
                    if($_password == $_POST['password']){
                        $_SESSION['is_login'] = true;
                        $_SESSION['user'] = $_POST['username'];
                        Header("HTTP/1.1 303 See Other");
                        header("Location: index.php");
                        exit();
                    }else{
                        Header("HTTP/1.1 303 See Other");
                        header("Location: login.php?info=密码不正确，请重新登陆！");
                        exit();
                    }
                }
            }
        }   
    }
    // echo $_SESSION['is_login'];
    // echo '<br>';
    // echo $_SESSION['user'];
    // exit();
    Header("HTTP/1.1 303 See Other");
    header("Location: login.php?info=用户名或密码不正确， 请重新登陆！");
    exit();
}
else
{
    Header("HTTP/1.1 303 See Other");
    header("Location: login.php?info=请输入用户名和密码");
    exit();
}

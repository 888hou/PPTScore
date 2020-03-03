<?php
include('init.php');
if( isset($_SESSION['is_login']) ){
    $_SESSION['is_login'] = '';
    unset($_SESSION['is_login']);
}
if( isset($_SESSION['user']) ){
    $_SESSION['user'] = '';
    unset($_SESSION['user']);
} 
if( isset($_SESSION['is_login']) && $_SESSION['is_login'] !='' ){
    $_SESSION['is_login'] = '';
    unset($_SESSION['is_login']);
}
if( isset($_SESSION['user']) && $_SESSION['user'] !='' )
{
    $_SESSION['user'] = '';
    unset($_SESSION['user']);
}
Header("HTTP/1.1 303 See Other");
header("Location: login.php");

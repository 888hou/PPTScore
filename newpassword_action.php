<?php
include('init.php');
if ($_SESSION['is_login'] == '' || $_SESSION['user'] ==''){
    header("Location:login.php");
}
//判断POST是否合法
if(isset($_POST['newpassword']) && isset($_POST['repassword']) && $_POST['repassword'] !='' && $_POST['repassword'] == $_POST['newpassword']){
  $newpassword = $_POST['repassword'];
}else{
  Header("HTTP/1.1 303 See Other");
  header("Location: newpassword.php?info=两次密码不一致，请重新输入！");
  exit();
}
//验证旧密码
if(isset($_SESSION['user']) && $_SESSION['user'] != ''){
  $dir = getDirContent('./users');
  if($dir){
    foreach($dir as $v){
      $arr = explode('.',$v);
      //判断是否有当前用户
      if($arr[1]=='txt' && $arr[0] != ''){
        //找到当前用户
        if($arr[0] == $_SESSION['user']) {
          //读取当前用户文件
          $file = file('./users/'.$v);
          $_password = str_replace(array("\r\n", "\r", "\n"), "", $file[0]);
          if(isset($_POST['oldpassword']) && $_password == $_POST['oldpassword']){
            //开始修改密码为新密码
            $file[0] = $newpassword."\r\n";
            file_put_contents('./users/'.$v, implode("", $file));
            //旧密码验证错误
            Header("HTTP/1.1 303 See Other");
            header("Location: newpassword.php?info=修改成功！");
            exit();
          }else{
            //旧密码验证错误
            Header("HTTP/1.1 303 See Other");
            header("Location: newpassword.php?info=原始密码不正确，请重新输入！");
            exit();
          }
        }
      }
    }
  }
}else{
  Header("HTTP/1.1 303 See Other");
  header("Location: newpassword.php?info=输入不正确，请重新输入！");
  exit();
}


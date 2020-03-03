<?php
include('init.php');
if ($_SESSION['is_login'] == '' || $_SESSION['user'] ==''){
    header("Location:login.php");
}
$list = getDirContent('./viewers');
//var_dump($list);
$list_tree = [];
if($list){
    foreach($list as $v){
        $innerList = getDirContent('./viewers/'.$v);
        if(file_exists('./viewers/'.$v.'/info.txt')){
            $file = file('./viewers/'.$v.'/info.txt');
            $list_name  = str_replace(array("\r\n", "\r", "\n"), "", $file[0]);
            $list_tree[$v] = $list_name;
        }
        // var_dump($innerList);
        // if($innerList){
        //     foreach($innerList as $info){
        //         if()
        //     }
        // }
    }
}
//var_dump($list_tree);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>首页-BY-HOUANG</title>
    <style>
        HTML,BODY,FORM
        {
            height:100%;
        }
        .container {
            width: 100%;
            height: 100%;
        }
        .container table {
            width: 100%;
            height: 100%;
        }
        .container .header {
            display: block;
            width: 100%;
            height: 30px;
            line-height: 30px; 
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php echo "欢迎！用户：".$_SESSION['user'] ?>
            <a href="newpassword.php">修改密码</a>
            <a href="logout.php">退出登录</a>
        </div>
        <div class="list">
            请选择类别：
            <ul>
            <?php
                foreach($list_tree as $lk => $lv){
            ?>
                <li><a href="list.php?floor=<?php echo $lk; ?>&name=<?php echo $lv; ?>"><?php echo $lv; ?></a></li>
            <?php
                }
            ?>
            </ul>
        </div>
    </div>
</body>
</html>
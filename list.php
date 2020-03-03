<?php
include('init.php');
if ($_SESSION['is_login'] == '' || $_SESSION['user'] ==''){
    header("Location:login.php");
}
$list = getDirContent('./viewers/'.$_GET['floor']);
//var_dump($list);
$list_tree = [];
if($list){
    //var_dump($list);
    foreach($list as $v){
        $innerList = getDirContent('./viewers/'.$_GET['floor'].'/'.$v);
        if(file_exists('./viewers/'.$_GET['floor'].'/'.$v.'/info.txt')){
            $file = file('./viewers/'.$_GET['floor'].'/'.$v.'/info.txt');
            $list_name  = str_replace(array("\r\n", "\r", "\n"), "", $file[0]);
            $list_tree[$_GET['floor']][$v] = $list_name;
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
            <a href="index.php">返回</a>
            <?php echo "欢迎！用户：".$_SESSION['user'] ?>
            <a href="newpassword.php">修改密码</a>
            <a href="logout.php">退出登录</a>
        </div>
        <div class="list">
            当前分组：<?php echo $_GET['name'] ?>
            <a href="index.php">重新选择</a>
            <br/>
            请选择要查看的文件：
            <br/>
            <ul>
            <?php
            if(!empty($list_tree)){
                foreach($list_tree[$_GET['floor']] as $lk => $lv){
            ?>
                <li><a href="viewer.php?group=<?php echo $_GET['floor'];?>&gname=<?php echo $_GET['name']; ?>&floor=<?php echo $lk; ?>&name=<?php echo $lv; ?>"><?php echo $lk; ?>号:<?php echo $lv; ?></a></li>
            <?php
                }
            }
            ?>
            </ul>
        </div>
    </div>
</body>
</html>
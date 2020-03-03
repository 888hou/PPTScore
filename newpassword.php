<?php
include('init.php');
if (!isset($_SESSION['user']) || $_SESSION['user'] ==''){
    header("Location: login.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改密码</title>
</head>
<body>
    <div class="container">
        <h2>修改密码</h2>
        <?php  
            if (isset($_GET['info']) && $_GET['info'] != ''){
        ?>
            <h3 style="color:red;"><?php echo $_GET['info'] ?></h3>
        <?php        
            }
            if (isset($_SESSION['user'])){
                echo '用户：'.$_SESSION['user'].'<br/><br/>';
            }
        ?>
        <form action="newpassword_action.php" method="post">
            原有密码：<input name="oldpassword" type="password">
            <br/><br/>
            新的密码：<input name="newpassword" type="password">
            <br/><br/>
            确认密码：<input name="repassword" type="password">
            <br/><br/>
            <input type="submit" value="修改">
            <a href="index.php">返回首页</a>
        </form>
    </div>
</body>
</html>
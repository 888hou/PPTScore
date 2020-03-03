<?php
include('init.php');
if ($_SESSION['is_login'] != '' && $_SESSION['user'] !=''){
    header("Location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户登录</title>
</head>
<body>
    <div class="container">
        <h2>用户登录</h2>
        <?php  
            if (isset($_GET['info']) && $_GET['info'] != ''){
            
        ?>
            <h3 style="color:red;"><?php echo $_GET['info'] ?></h3>
        <?php        
            }
            if (isset($_SESSION['user'])){
                echo $_SESSION['user'];
            }
            if (isset($_SESSION['is_login'])){
                echo $_SESSION['is_login'];
            }
        ?>
        <form action="login_action.php" method="post">

            用户名：<input type="text" name="username">
            <br/><br/>
            密&nbsp;&nbsp;码：<input type="password" name="password">
            <br/><br/>
            <input type="submit" value="登录">
        </form>
    </div>
</body>
</html>
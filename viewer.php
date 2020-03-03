<?php
include('init.php');
if ($_SESSION['is_login'] == '' || $_SESSION['user'] ==''){
    header("Location:login.php");
}
$img_list = [];
$floor_dir = './viewers/'.$_GET['group'].'/'.$_GET['floor'].'/images';
if(file_exists($floor_dir)){
    $list = getDirContent($floor_dir);
    if($list){
        //var_dump($list);
        foreach($list as $v){
            $arr = explode('.',$v);
            if($arr['1'] == 'Jpeg'){
                $img_list[$arr[0]] = $floor_dir.'/'.$v;
            }
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $_GET['gname']?>-<?php echo $_GET['floor']?>号-<?php echo $_GET['name']?></title>
    <style>
        .content {
            width: 100%;
            text-align: center;
        }
        .content img {
            width: 85%;
            margin: 10px auto;
            overflow: hidden;
        }
        .content a {
            display: block;
        }
    </style>
</head>
<body>
    <div class="content">
        <?php echo $_GET['gname']?>-<?php echo $_GET['floor']?>号-<?php echo $_GET['name']?>
        <br/>
        <a href="/PPTScore/list.php?floor=<?php echo $_GET['group']?>&name=<?php echo $_GET['gname']?>">返回列表</a>
        <?php
            if($img_list){
                foreach($img_list as $ik=>$iv){
        ?>
            <img src="<?php echo $iv; ?>" alt="">
        <?php
                }
            }
        ?>
        <br/>
        <?php echo $_GET['gname']?>-<?php echo $_GET['floor']?>号-<?php echo $_GET['name']?>
        <br/>
        <a href="/PPTScore/list.php?floor=<?php echo $_GET['group']?>&name=<?php echo $_GET['gname']?>">返回列表</a>
    </div>
</body>
</html>
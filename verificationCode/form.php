<?php

if(isset($_REQUEST['authcode'])){
    session_start();
    echo $_SESSION['authcode'];
    if(strtolower($_REQUEST['authcode'])===$_SESSION['authcode']){
        echo '<font color="#0000cc">输入正确</font>';
    }else{
        echo '<font color="#cc0000">输入错误</font>';
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>验证码</title>
</head>
<body>
<form method="post" action="form.php">
    <p>验证码图片：
        <img src="test.php" onclick="this.src = 'test.php'" border="1">
        <small>点击图片刷新验证码</small>
    </p>
    <p>
        请输入图片中的内容
        <input type="text" name="authcode" value=""/>
    </p>
    <p>
        <input type="submit" value="提交" style="padding: 6px 20px">
    </p>

</form>
</body>
</html>

<?php if (!defined('THINK_PATH')) exit();?><!-- 設定網頁編碼為UTF-8 -->
<!DOCTYPE html>
<html>
<head>
  <title>LibrarySystem</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
  <link href="/LibrarySystem/Public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

  <!-- Style --> <link rel="stylesheet" href="/LibrarySystem/Public/css/style.css" type="text/css" media="all">
</head>
<body>
        <h1>歡迎使用圖書館管理系統</h1>

        <div class="w3layoutscontaineragileits">
        <h2>Login here</h2>
            <form action="http://localhost/LibrarySystem/index.php/Home/Login/postLogin" method="post">
                <input type="text" name="id" placeholder="帳號" required="">
                <input type="password" name="pwd" placeholder="密碼" required="">
                
                <input type="submit" name="user_login" value="用戶登入">
                <input type="submit" name="emp_login" value="管理員登入">

                <div class="aitssendbuttonw3ls">
                    <p> 帳號註冊 <span>→</span> <a class="w3_play_icon1" href="register.html"> Click Here</a></p>
				    <div class="clear"></div>
                </div>
            </form>
        </div>

</body>
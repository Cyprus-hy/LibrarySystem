<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>user</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
   
</head>
<body>
        <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="page-header">
                            <h1>
                                 <strong>個人信息</strong>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-8 column">
                            <div id="myAlert" class="alert alert-success">
                                    <table class="table" id="info">
                                        <th>姓名</th>
                                        <th>性別</th>
                                        <th>電話</th>
                                        <th>郵箱</th>
                                        <th>所在單位</th>
                                        <tbody id="info">
                                            <tr>
                                                <td id="emp_name"></td>
                                                <td id="gender"></td>
                                                <td id="phone"></td>
                                                <td id="email"></td>
                                                <td id="libname"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                    </div>
                    <div class="col-md-4 column">
                    </div>
                </div>
            </div>       
</body>

<footer>
        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>  
        <!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
        <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script> 
        <!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
        <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
        <!-- 引入自己的js,使用相对路径 -->
        <script src="/LibrarySystem/Public/JS/employee.js"></script>
    
    </footer>
</html>
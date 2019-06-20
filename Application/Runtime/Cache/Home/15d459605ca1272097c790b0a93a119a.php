<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
                                借還書紀錄
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        書名
                                    </th>
                                    <th>
                                        作者
                                    </th>
                                    <th>
                                        出版社
                                    </th>
                                    <th>
                                        借書時間
                                    </th>
                                    <th>
                                        實際還書時間
                                    </th>
                                    <th>
                                        預期還書時間
                                    </th>
                                    <th>
                                        罰款金額
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="borrow_body"> 
                            </tbody>
                        </table>
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
        <script src="/LibrarySystem/Public/JS/borrow_record.js"></script>
    
    </footer>

</html>
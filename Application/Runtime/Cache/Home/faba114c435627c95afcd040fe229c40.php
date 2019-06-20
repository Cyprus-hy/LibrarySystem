<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>預約書籍</title>
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
                                添加書籍
                            </h1>
                        </div>
                    </div>
                    <div class="btn-group pull-right">
                            <a href="homeEmp.html"  class="btn btn-default">
                                    <em class="glyphicon glyphicon-home"></em> 主頁 </a> 
                            <a href="employee.html" class="btn btn-default" >
                                    <em class="glyphicon glyphicon-user"></em> 個人信息</a> 
                            <a href="deploy.html" class="btn btn-default" >
                                    <em class="glyphicon glyphicon-pencil"></em> 調派書籍</a> 
                            <a href="deleteBook.html" class="btn btn-default">
                                    <em class="glyphicon glyphicon-trash"></em> 刪除书籍</a> 
                            <a href="login.html" class="btn btn-default">
                                    <em class="glyphicon glyphicon-log-out"></em> 登出 </a>
                    </div>
                    <p></p>
                </div>
                <div class="row clearfix">
                    <div class="col-md-2 column">
                    </div>
                    <div class="col-md-6 column">
                            <form role="form" method="POST" action="http://localhost/LibrarySystem/index.php/Home/Employee/AddBook"  >
                                <div class="form-group">
                                     <label for="user-id">書名</label>
                                     <input type="text" class="form-control" name="book_name"  />
                                </div>
                                <div class="form-group">
                                     <label for="name">作者</label>
                                     <input type="text" class="form-control" name="book_author"/>
                                </div>
                                <div class="form-group">
                                        <label for="institution">出版社</label>
                                        <input type="text" class="form-control" name="book_publisher"  />
                                </div>
                                <div class="form-group">
                                        <label for="phone">價格</label>
                                        <input type="text" class="form-control" name="book_price"/>
                                </div>
                                <div class="form-group">
                                        <label for="email">索引號</label>
                                        <input type="text" class="form-control" name="book_callnum" />
                                </div>
                                <div class="form-group">
                                        <label for="password">所在圖書館</label>
                                        <input type="text" class="form-control" name="lib_name"  />
                                </div>
                                <div class="form-group">     
                                <button type="submit" class="btn btn-default">添加</button>
                            </form>
                    </div>
                    <div class="col-md-4 column">
                    </div>
                </div>
            </div>
</body>
</html>
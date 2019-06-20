<?php
return array(
	//'配置项'=>'配置值'

    // 开启路由
    'URL_ROUTER_ON' => true ,
    'URL_ROUTE_RULES'=>array(
        ///以下是Get方法
        'Book/getBookInfobyName/'=>array('Book/getBookInfobyName','method'=>'post'),
        'Employee/getPersonalInfoByID'=>array('Employee/getPersonalInfoByID','method'=>'get'),
        'Employee/DeployBook'=>array('Employee/DeployBook','method'=>'post'),
        'Employee/AddBook'=>array('Employee/AddBook','method'=>'post'),
        'Employee/DeleteBook'=>array('Employee/DeleteBook','method'=>'post'),
        'Employee/Logout'=>array('Employee/Logout'),
        'Login/postLogin'=>array('Login/postLogin','method'=>'post'),
        'Register/postNewRegister'=>array('Register/postNewRegister','method'=>'post'),
        'User/getPersonalInfoByID'=>array('User/getPersonalInfoByID','method'=>'post'),
        'User/getBorrowRecordByID'=>array('User/getBorrowRecordByID','method'=>'get'),
        'User/OrderBook'=>array('User/OrderBook','method'=>'post'),
        'User/Logout'=>array('User/Logout'),
        'Hello' => array('Hello/sayHello'),
    ),
);
<?php

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\UserModel;
use Home\Model\EmployeeModel;

class LoginController extends RestController {

    public function postLogin()
    {
        $id = $_POST['id'];
        $password = $_POST['pwd'];

        if(isset($_POST['user_login'])){
            if (!empty($id) && !empty($password)) {
                $sql = new UserModel();
                $select = $sql->query("select * from user where user_id='$id' and user_password='$password'");
                if ($select) {
                    session_start();
                    $_SESSION['id'] = $id;
                    //$_SESSION['name']=$select['user_name'];
                    $_SESSION['type'] = 'user';
                    //$this->response($_SESSION['id']);
                    $this->redirect('Index/homeUser', '', 2,
                        '登錄成功！前往首頁!...页面跳转中...');
                } else {
                    $this->redirect('Index/login', '', 2,
                        '賬號或密碼錯誤!...页面跳转中...');
                }
            } else {
                $this->redirect('Index/login', '', 2,
                    '請填寫賬號與密碼!...页面跳转中...');
            }
        }

        else if(isset($_POST['emp_login'])){
            if (!empty($id) && !empty($password)) {
                $sql = new EmployeeModel();
                $select =  $sql->query("select * from employee where emp_id='$id' and emp_password='$password'");
                if ($select) {
                    session_start();
                    $_SESSION['id'] = $id;
                    //$_SESSION['name']=$select['emp_name'];
                    $_SESSION['type'] = 'employee';
                    $this->redirect('Index/homeEmp', '', 2,
                        '登錄成功！前往首頁!...页面跳转中...');
                } else {
                    $this->redirect('Index/login', '', 2,
                        '賬號或密碼錯誤!...页面跳转中...');
                }
            } else {
                $this->redirect('Index/login', '', 2,
                    '請填寫賬號與密碼!...页面跳转中...');
            }
        }

        else if(isset($_POST['register'])){
            $this->redirect('Index/register','',2,
                '前往註冊中心!...页面跳转中...');
        }

        else{
            $this->redirect('Index/login', '', 2,
                '您無權限觀看此界面!...页面跳转中...');
        }
    }
}
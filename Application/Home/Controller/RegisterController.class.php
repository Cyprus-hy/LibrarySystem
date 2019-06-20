<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 23:52
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\UserModel;
use Home\Model\EmployeeModel;
use Home\Model\LibraryModel;

class RegisterController extends RestController {
    public function postNewRegister(){
        $id = $_POST['user_id'];
        $name = $_POST['name'];
        $institution=$_POST['institution'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type=$_POST['type'];

        ///區分學生、老師與管理員註冊
        if (empty($id)||empty($name)||empty($institution)||empty($gender)||empty($phone)
            ||empty($email)||empty($password)||empty($type)){
            $this->redirect('Index/register','',2,
                '請填寫所有信息!...页面跳转中...');
        }
        else{
            $this->_addNewUser($id, $name,$institution,$gender,$phone, $email, $password,$type);
        }
    }

    private function _addNewUser($id, $name, $institution,$gender,$phone, $email, $password,$type) {
        $data = array();
        ///管理員註冊
        if($type=='employee'){
            $data['emp_id'] = $id;
            $data['emp_name'] = $name;
            $data['emp_gender'] = $gender;
            $data['emp_phone'] = $phone;
            $data['emp_email'] = $email;
            $data['emp_password'] = $password;

            $l_sql=new LibraryModel();
            $lib=$l_sql->field('lib_id')->where("lib_name='$institution'")->select();
            //$lib=$l_sql->query("select lib_id from library where lib_name='$institution'");
            ///lib是否存在
            if($lib[0]){
                $data['lib_id']=$lib[0]['lib_id'];
                $e_sql = new EmployeeModel();
                $info=$e_sql->query("select * from employee where emp_id='$id'");
                if (!$info) {
                    $e_sql->add($data);
                    $this->redirect('Index/login', '', 2,
                        '賬號註冊成功!...页面跳转中...');
                } else {
                    $this->redirect('Index/login','',2,
                        '該用戶已存在!...页面跳转中...');
                }
            }
            else{
                $this->redirect('Index/register','',2,
                    '請正確填寫所屬機構!...页面跳转中...');
            }
        }

        ///會員註冊
        else{
            $data['user_id'] = $id;
            $data['user_name'] = $name;
            $data['user_department']=$institution;
            $data['user_gender'] = $gender;
            $data['user_phone'] = $phone;
            $data['user_email'] = $email;
            $data['user_password'] = $password;
            $data['user_type']=$type;

            ///老師與學生借書時間與本數的區別
            if($type=='student'){
                $data['user_maxnum']=10;
                $data['user_maxtime']=30;
            }
            else{
                $data['user_maxnum']=20;
                $data['user_maxtime']=60;
            }

            $sql = new UserModel();
            $info=$sql->query("select * from user where user_id='$id'");
            if (!$info) {
                $sql->add($data);
                $this->redirect('Index/login', '', 2,
                    '賬號註冊成功!...页面跳转中...');
            } else {
                $this->redirect('Index/login','',2,
                    '該用戶已存在!...页面跳转中...');
            }
        }
    }
}
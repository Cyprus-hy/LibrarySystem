<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/10
 * Time: 23:33
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\BookModel;
use Home\Model\EmployeeModel;
use Home\Model\LibraryModel;

class EmployeeController extends RestController {
    public function getPersonalInfoByID(){
        $e_sql=new EmployeeModel();
        $id=$_SESSION['id'];
        $emp=$e_sql->field('emp_password',true)->where("emp_id='$id'")->select();

        $l_sql=new LibraryModel();
        $lib_id=$emp[0]['lib_id'];
        $lib=$l_sql->field('lib_name')->where("lib_id='$lib_id'")->select();

        $data=$emp[0];
        $data['lib_name']=$lib[0]['lib_name'];
        $this->ajaxReturn($data,'json');
    }

    public function DeployBook(){
        $id=$_POST['book_id'];
        $lib_name=$_POST['lib_name'];
        if(empty($id)||empty($lib_name)){
            $this->redirect('Index/deploy', '', 2,
                '請填寫書籍ID與圖書館名字!...页面跳转中...');
        }
        else{
            $l_sql=new LibraryModel();
            $lib=$l_sql->field('lib_id')->where("lib_name='$lib_name'")->select();
            $b_sql=new BookModel();
            $book=$b_sql->field('*')->where("book_id='$id'")->select();
            if(!$lib[0]||!$book[0]){
                $this->redirect('Index/deploy', '', 2,
                    '調派失敗！請填寫正確的書籍ID與圖書館名字!...页面跳转中...');
            }
            else{
                if($book[0]['lib_id']==$lib[0]['lib_id']){
                    $this->redirect('Index/deploy', '', 2,
                        '這本書已在被調用的圖書館中!...页面跳转中...');
                }
                else{
                    if($book[0]['book_state']=='out'){
                        $this->redirect('Index/deploy', '', 2,
                            '這本書已被借出，不可調用!...页面跳转中...');
                    }
                    else{
                        $data['lib_id']=$lib[0]['lib_id'];
                        $b_sql->where("book_id=$id")->save($data);
                        $this->redirect('Index/deploy', '', 2,
                            '調派成功!...页面跳转中...');
                    }
                }
            }

        }
    }

    public function AddBook(){
        $data=array();
        $data['book_name']=$_POST['book_name'];
        $data['book_author']=$_POST['book_author'];
        $data['book_publisher']=$_POST['book_publisher'];
        $data['book_price']=$_POST['book_price'];
        $data['book_callnum']=$_POST['book_callnum'];

        $lib_name=$_POST['lib_name'];
        $l_sql=new LibraryModel();
        $lib=$l_sql->field('lib_id')->where("lib_name='$lib_name'")->select();
        $data['lib_id']=$lib[0]['lib_id'];
        $data['book_state']='in';

        if(empty($data['book_name'])||empty($data['book_author'])||empty($data['book_publisher'])
            ||empty($data['book_price'])||empty($data['book_callnum'])||empty($data['lib_id'])){
            $this->redirect('Index/addBook','',2,
                '請正確填寫所有書籍信息!...页面跳转中...');
        }
        else{
            $b_sql=new BookModel();
            $b_sql->add($data);
            $this->redirect('Index/addBook','',2,
                '書籍添加成功!...页面跳转中...');
        }
    }


    public function DeleteBook(){
        $id=$_POST['book_id'];
        //$this->response($id);
        if(empty($id)){
            $this->redirect('Index/deleteBook','',1,
                '請輸入要刪除的書籍ID!...页面跳转中...');
        }
        else{
            $b_sql=new BookModel();
            $res=$b_sql->field("*")->where("book_id='$id'")->select();
            if(!$res[0]){
                $this->redirect('Index/deleteBook','',1,
                    '刪除失敗!這本書不存在！...页面跳转中...');
            }
            else{
                $b_sql->where("book_id='$id'")->delete();
                $this->redirect('Index/deleteBook','',1,
                    '書籍刪除成功!...页面跳转中...');
            }
        }
    }

    public function Logout(){
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        $this->redirect('Index/login', '', 1,
            '註銷登錄成功!...页面跳转中...');
    }
}
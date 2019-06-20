<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/10
 * Time: 23:33
 */

namespace Home\Controller;

use Think\Controller\RestController;
use Home\Model\UserModel;
use Home\Model\EntryModel;
use Home\Model\BookModel;
use Home\Model\FineModel;

class UserController extends RestController {
    public function getPersonalInfoByID(){
        $sql=new UserModel();
        $id=$_SESSION['id'];
        $res=$sql->field('user_password',true)->where("user_id='$id'")->select();
        $this->ajaxReturn($res[0],'json');
    }

    public function getBorrowRecordByID(){

        ///多條借書記錄，二維數組
        $e_sql=new EntryModel();
        $id=$_SESSION['id'];
        $ents=$e_sql->field('*')->where("user_id='$id'")->select();
        $f_sql=new FineModel();
        $b_sql=new BookModel();
        $datas=array();

        foreach ($ents as $ent){
            $book_id=$ent['book_id'];
            $book=$b_sql->field('book_name,book_author,book_publisher')->where("book_id='$book_id'")->select();

            $ent_id=$ent['ent_id'];
            $fine=$f_sql->field('expected_return_time,fine_num')->where("ent_id='$ent_id'")->select();

            //返回借書記錄
            $data=$book[0];
            $data['borrow_time']=$ent['borrow_time'];
            $data['practical_return_time']=$ent['practical_return_time'];
            $data['expected_return_time']=$fine[0]['expected_return_time'];
            $data['fine_num']=$fine[0]['fine_num'];
            array_push($datas, $data);
        }
        $this->ajaxReturn($datas,'json');
    }

    public function OrderBook(){
        $id=$_POST['book_id'];
        if(empty($id)){
            $this->redirect('Index/order', '', 2,
                '請填寫書籍ID!...页面跳转中...');
        }
        else{
            $b_sql=new BookModel();
            $book=$b_sql->field('*')->where("book_id='$id'")->select();
            if(!$book[0]){
                $this->redirect('Index/order', '', 2,
                    '這本書不存在!...页面跳转中...');
            }
            else {
                if ($book[0]['book_state'] == 'in') {
                    $this->redirect('Index/order', '', 2,
                        '這本書在館，可以直接借用!...页面跳转中...');
                } else if ($book[0]['book_state'] == 'order') {
                    $this->redirect('Index/order', '', 2,
                        '這本書已經被預定!...页面跳转中...');
                } else {
                    //更新
                    //$b_sql->query("update book set book_state='order' where book_id='$id'");
                    $b_sql->execute("update book set book_state='order' where book_id='$id'");
                    $this->redirect('Index/order', '', 2,
                        '預定成功!...页面跳转中...');
                }
            }
        }
    }

    public function Logout(){
        unset($_SESSION['id']);
        unset($_SESSION['type']);
        $this->redirect('Index/login', '', 2,
            '註銷登錄成功!...页面跳转中...');
    }
}
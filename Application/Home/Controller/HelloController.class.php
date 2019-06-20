<?php
namespace Home\Controller;
use Think\Controller\RestController;
use Home\Model\ActorModel;

class HelloController extends RestController
{
    public function sayHello() {
        $this->response("Cyprus");
    }
}


/* 以下代码是验证json中含有中文的编解码过程，备注，不要删除
 *
 $content=json_encode($data);
 $content_url=urlencode($content);


 //$obj=urldecode($content1);
 //trace($obj,'URLDecoder');
 //$obj1=json_decode($obj);
 //trace($obj1,'Decoder:');
 */

/*
 * 修改
$jsonString=I('post.Content');
$jsonString = urldecode($jsonString);
$jsonString=htmlspecialchars_decode($jsonString);
$jsonString=json_decode($jsonString);
$arr = array($jsonString);
$materialserialObj=D("MaterialSerial");
$materialserialid=$arr[0][0]->materialserialid;
$data['MaterialBrandID']=$arr[0][0]->materialbrandid;
$data['MaterialSerialName']=$arr[0][0]->materialserialname;
$data['MaterialSerialMemo']=$arr[0][0]->materialserialmemo;
$sqlresult=$materialserialObj->where("MaterialSerialID='%s'",$materialserialid)->save($data);
//$this->response($materialserialObj->getLastSql());
if(false === $sqlresult){
    $this->response($materialserialObj->getDbError());
    $result['resultcode']='0';
    $result['resultcontent']="修改失败";
}
else
{
    $result['resultcode']='1000';
    $result['resultcontent']=$materialserialid;
}
$this->response($result,'json');
*/
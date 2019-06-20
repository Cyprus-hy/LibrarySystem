<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 21:55
 */
namespace Home\Model;
use Think\Model;
class BookModel extends Model
{
    protected $trueTableName = 'book';
    public function __construct()
    {
        parent::__construct();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 21:54
 */

namespace Home\Model;
use Think\Model;

class UserModel extends Model
{
    protected $trueTableName = 'user';
    public function __construct()
    {
        parent::__construct();
    }
}
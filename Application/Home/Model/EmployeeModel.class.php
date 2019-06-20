<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 21:56
 */
namespace Home\Model;
use Think\Model;
class EmployeeModel extends Model
{
    protected $trueTableName = 'employee';
    public function __construct()
    {
        parent::__construct();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 21:58
 */
namespace Home\Model;
use Think\Model;

class FineModel extends Model
{
    protected $trueTableName = 'fine';
    public function __construct()
    {
        parent::__construct();
    }
}
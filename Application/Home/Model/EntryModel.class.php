<?php
/**
 * Created by PhpStorm.
 * User: 蕴yun
 * Date: 2019/6/9
 * Time: 21:57
 */
namespace Home\Model;
use Think\Model;
class EntryModel extends Model
{
    protected $trueTableName = 'entry';
    public function __construct()
    {
        parent::__construct();
    }
}
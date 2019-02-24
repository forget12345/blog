<?php
namespace app\index\model;

use think\Model;
use think\model\concern\SoftDelete;
class Content extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
}
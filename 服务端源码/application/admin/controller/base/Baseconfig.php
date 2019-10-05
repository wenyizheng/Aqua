<?php

namespace app\admin\controller\base;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 基本配置
 *
 * @icon fa fa-circle-o
 */
class Baseconfig extends Backend
{
    
    /**
     * ShowerBaseconfig模型对象
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('ShowerBaseconfig');

    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个方法
     * 因此在当前控制器中可不用编写增删改查的代码,如果需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}

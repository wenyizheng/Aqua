<?php
/**
 * Created by PhpStorm.
 * User: xueji
 * Date: 2017/8/8
 * Time: 14:26
 */
namespace app\upper\controller;

use \think\Controller;

class Upper extends Controller{

    public function index(){
        return view('upper');
    }

    public function upper(){
        return view('upper2');
    }
}
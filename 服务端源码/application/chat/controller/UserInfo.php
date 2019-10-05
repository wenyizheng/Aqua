<?php

namespace app\chat\controller;


use think\Controller;
use think\Request;
use EasyWeChat\Foundation\Application;
use app\common\controller\Frontend;
use think\Config;
use app\chat\model\ShowerUser;
use app\chat\controller\Check;
use Upyun\Upyun;


use EasyWeChat\Payment\Order;

class UserInfo extends Controller{

    public $app=null;
    public $check=null;
    public function __construct(Request $request = null){
        parent::__construct($request);
        new Frontend();
        $this->app=new Application(Config::get('wechat'));
        $check=new Check();
        $check->CheckUser();

    }

    //查看个人信息
    public function InfoLook(Request $request){
        echo "<pre>";
        print_r($request::instance());
        echo "</pre>";
    }

    public function InfoChange(Request $request){
        if($request->method()=='GET'){
            switch ($request->get('type')){
                case '':$this->fetch();break;
                case 'tel':$this->fetch();break;
                case 'pwd':$this->fetch();break;
                default:$this->fetch();
            }
        }

        if($request->method()=='POST'){

        }
    }
    public function test(){
        return view();
    }
    public function InfoBind(Request $request){
        if($request->method()=='GET'){
            $openid=session('wechat_user')['id'];

            $user=ShowerUser::where('openid',$openid)->find();

            if(!empty($user)){
                $this->success(','https://wenyizheng.cn/fastadmin/public/index.php/cha');
            }

            return view();
        }

        //

    }

    public function test2()
    {
        return view();
    }


    public function test4(){
        return view();

    }

}
<?php
namespace app\chat\controller;

use think\Controller;
use EasyWeChat\Foundation\Application;
use app\common\controller\Frontend;
use think\Config;
use app\chat\model\ShowerUser;
use app\chat\controller\Check;
use think\Request;
use think\View;

class BathInfo extends Controller{
    public $app=null;
    public $check=null;
    private $code=null;
    private $msg=null;
    private $content=null;
    private $template=null;

    public function __construct(Request $request = null){
        parent::__construct($request);
        new Frontend();
    }

    private function SendMessage(){
        $this->template=['code'=>$this->code,'msg'=>$this->msg,'content'=>$this->content];
        echo json_encode($this->template);
    }

    public function RoomInfo(Request $request){
        if($request->method()=='GET'){

            $openid=session('wechat_user')['id'];

            $user=ShowerUser::where('openid',$openid)->find();

        }
    }

    public function RoomInfo2(Request $request){

    }

    public function feedback(Request $request){
        if($request->method()=='GET'){
            return view();
        }
    }

    public function ShowerBegin(){

        return view();
    }
    public function ShowerEnd(){
        return view();
    }
    public function ShowerOpen(){
        return view();
    }
    public function ShowerPromise(){
        return view();
    }



}
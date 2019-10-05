<?php
namespace app\chatapi\controller;

use app\admin\model\ShowerCouponScene;
use app\chatapi\model\ShowerCoupon;
use app\chatapi\model\ShowerRoom;
use think\Controller;
use think\Debug;
use think\Exception;
use think\Request;
use think\Config;
use app\common\controller\Frontend;
use EasyWeChat\Foundation\Application;
use app\chat\controller\Check;
use Upyun\Upyun;
use think\Db;

//模型
use app\chatapi\model\ShowerUser;

class UserInfo extends Controller{

    public $redis='';
    public $app=null;
    public $check=null;
    private $code;
    private $msg;
    private $content;
    private $template;
    public function __construct(Request $request = null){
        parent::__construct($request);
        new Frontend();
        $this->app=new Application(Config::get('wechat'));
        $this->check=new Check();
    }

    private function SendMessage(){
        $this->template=['code'=>$this->code,'msg'=>$this->msg,'content'=>$this->content];
        echo json_encode($this->template);
    }

    public function ImgUpload(Request $request){
        if($request->method()=='POST') {
            if (!empty($_FILES['img'])) {
                $filename = $_FILES['img']['tmp_name'];
                $file = fopen($filename, 'r');
                $bucketConfig = new \Upyun\Config('shower', 'phpwenyizheng', 's7uq2dd5e');
                $client = new Upyun($bucketConfig);
                $filepath = '/up/' . uniqid(rand()) . $_FILES['img']['name'];
                $res = $client->write($filepath, $file);
                if ($res) {
                    echo json_encode('filepath:' .'https://shower.b0.upaiyun.com'. $filepath);
                }
            }else{
                $this->code=15000;$this->msg='parameter';
                $this->SendMessage();
            }
        }
    }
    public function UserChat(Request $request){
        if($request->method()=='GET'){

            $chat_user_info=session('wechat_user');
            if($chat_user_info) {
                echo json_encode($chat_user_info);
            }else{
                $this->code=16007;$this->msg='session-wechat_user expired';
                $this->SendMessage();
            }
        }
    }

    public function UserObtain(Request $request)
    {
        if ($request->method() == 'GET') {
            $data = json_decode($request->get('data'));
            if (empty($data->openid) && empty($data->tel) && empty($data->user_id)) {
                $this->code = 15000;
                $this->msg = 'parameter error';
                $this->SendMessage();
                die();
            }
            if (!empty($data->openid)) {
                $user = ShowerUser::get(['openid' => $data->openid]);
                echo json_encode($user);
            } else if (!empty($data->tel)) {
                $user = ShowerUser::get(['tel' => $data->tel]);
                echo json_encode($user);
            } else if (!empty($data->user_id)) {
                $user = ShowerUser::get(['user_id' => $data->user_id]);
                echo json_encode($user);
            } else {

            }
        }
    }

    public function UserBind(Request $request){
        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if(empty($data->nickname)||empty($data->password1)||empty($data->password2) ||empty($data->sex)
                ||empty($data->room_name)|| empty($data->block_name)||empty($data->tel)||empty($data->validate)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $validate=session($data->tel);
            if($data->validate!=$validate){
                $this->code=16002;$this->msg='tel validate error';
                $this->SendMessage();
                die();
            }

            if($data->password1!=$data->password2){
                $this->code=16003;$this->msg='two passwords are different';
                $this->SendMessage();
                die();
            }

            $openid=@session('wechat_user')['id'];
            if(empty($openid)){
                $this->code=16004;$this->msg='session-openid expired';
                $this->SendMessage();
                die();
            }

            if($data->sex=='男'){
                $data->sex=1;
            }else{
                $data->sex=0;
            }
            $headimgurl=session('wechat_user')['original']['headimgurl'];
            $info=['nickname'=>$data->nickname,'headimgurl'=>$headimgurl,
                'openid'=>$openid, 'sex'=>$data->sex, 'user_key'=>$password,'room_name'=>$data->room_name,
                'block_name'=>$data->block_name,'tel'=>$data->tel];
            try{
                $createres=ShowerUser::create($info);
            }catch (Exception $e){
                echo json_encode(['res'=>0]);
                die();
            }

            if($createres){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function UserChange(Request $request){
        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            $userdata=['nickname'=>$data->nickname,'sex'=>$data->sex, 'room_name'=>$data->room_name,'block_name'=>$data->block_name];
            $res=Db::table("fa_shower_user")->where('openid',$data->openid)->update($userdata);
            if($res){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function PwdChange(Request $request){
        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if(empty($data->password1)||empty($data->password2)||empty($data->oldpassword)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            if($res){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function TelChange(Request $request){
        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if((empty($data->openid)&&empty($data->user_id))||empty($data->tel)||empty($data->validate)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $validate=@session($data->tel);
            if(empty($validate)){
                $this->code=16006;$this->msg='tel validate expired';
                $this->SendMessage();
                die();
            }
            //判断验证码是否正确
            if($validate!=$data->validate){
                $this->code=16002;$this->msg='tel validate error';
                $this->SendMessage();
                die();
            }

            if(empty($data->openid)){
                $this->code=16004;$this->msg='session-openid expired';
                $this->SendMessage();
                die();
            }
            if($res){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }
    public function PwdCheck(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->password)||(empty($data->openid)&&empty($data->user_id))){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            if($oldpassword==$password){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function TelCheck(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->validate)||empty($data->tel)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $validate=@session($data->tel);
            if($data->verify==$validate){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }
    public function TelCodeGet(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            //判断tel是否填写
            if(empty($data->tel)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type'=>'application/x-www-form-urlencoded'));
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // post数据
            curl_setopt($ch, CURLOPT_POST, 1);
            // post的变量
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            $output = curl_exec($ch);
            curl_close($ch);


            $output=json_decode($output);


            if(@$output->respCode=='00000'){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function MoneyGet(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->openid)&&empty($data->user_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            if(!empty($data->openid)) {
                $user = ShowerUser::get(['openid' => $data->openid]);
            }
            if(!empty($data->user_id)){
                $user = ShowerUser::get(['user_id'=>$data->user_id]);
            }

            if(!empty($user)) {
                echo json_encode(['money' => $user->money]);
            }else{
                $this->code=16008;$this->msg='user not exist';
                $this->SendMessage();
            }
        }
    }

    public function forgetPwd(Request $request)
    {
        if($request->method()=='POST'){

            $data=json_decode($request->post('data'));
            if(empty($data->tel)||empty($data->validate)||empty($data->password1)||empty($data->password2)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }


            if(session($data->tel)!=$data->validate){
                $this->code=16002;$this->msg='tel validate error';
                $this->SendMessage();
                die();
            }

            if($data->password1!=$data->password2){
                $this->code=16003;$this->msg='Two passwords are different';
                $this->SendMessage();
                die();
            }


            if($res){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }

        }
    }

    public function exchangeCoupon(Request $request)
    {
        if($request->method()=='POST'){

            $data=json_decode($request->post('data'));
            if(empty($data->scene_id)||empty($data->user_id)) {
                $this->code = 15000;
                $this->msg = 'parameter error';
                $this->SendMessage();
                die();
            }

            if(empty($user->integral)){
                $this->code=16008;$this->msg='user not exist';
                $this->SendMessage();
                die();
            }

            $userintegral=$user->integral;
            $couponintegral=$couponscene->integral;

            if($couponintegral>$userintegral){
                $this->code=16015;$this->msg='integral not enough';
                $this->SendMessage();
                die();
            }

            $couponsn=substr(uniqid(rand(),true),0,30);
            $nowtime=date('ymdHi',time());
            Db::startTrans();

            if($createres){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }


        }
    }

    public function getCouponSceneList(Request $request)
    {
        if($request->method()=='GET'){

            $couponscenelist=ShowerCouponScene::all();

            echo json_encode($couponscenelist);
        }
    }

    public function UserScanShowerBegin(Request $request)
    {
        $openid=session('wechat_user')['id'];
        $userinfo=ShowerUser::where('openid',$openid)->find();
        if(!empty($userinfo)){
            $tel=$userinfo->tel;
            $userkey=$userinfo->user_key;
        }
        $roomid=$request->get('room_id');

        if(empty($roomid)||empty($tel)||empty($userkey)){
            $this->code=15000;$this->msg='parameter error';
            $this->SendMessage();
            die();
        }

        $sendhost=['type'=>'showerbegin','content'=>['room_id'=>$roomid,'tel'=>$tel,'user_key'=>$userkey]];
        $sendhost=json_encode($sendhost);

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,'data='.$sendhost);
        $res=curl_exec($ch);
        curl_close($ch);
        $res=json_decode($res);

        if($res->code=='5000'){
            echo json_encode(['res'=>1]);
        }else{
            echo json_encode(['res'=>0]);
        }


    }

    public function UserScanShowerEnd(Request $request){

        $roomid=$request->get('room_id');
        $openid=session('wechat_user')['id'];
        $userinfo=ShowerUser::where('openid',$openid)->find();
        if(!empty($userinfo)){
            $tel=$userinfo->tel;
            $userkey=$userinfo->user_key;
        }
        $roominfo=ShowerRoom::where('room_id',$roomid)->find();
        if(!empty($roominfo)){
            $blockid=$roominfo->block_id;
        }

        if(empty($roomid)||empty($tel)||empty($userkey)||empty($blockid)){
            $this->code=15000;$this->msg='parameter error';
            $this->SendMessage();
            die();
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,'data='.$sendhost);
        $res=curl_exec($ch);
        curl_close($ch);

        $res=json_decode($res);

        if($res->code=='8000'){
            echo json_encode(['res'=>1]);
        }else{
            echo json_encode(['res'=>0]);
        }



    }

    public function UserScanBoxOpen(Request $request){
        $roomid=$request->get('room_id');
        $openid=session('wechat_user')['id'];
        $userinfo=ShowerUser::where('openid',$openid)->find();

        if(!empty($userinfo)){
            $tel=$userinfo->tel;
            $userkey=$userinfo->user_key;
        }

        if(empty($roomid)||empty($tel)||empty($userkey)){
            $this->code=15000;$this->msg='parameter error';
            $this->SendMessage();
            die();
        }

        $sendhost=['type'=>'boxopen','content'=>['room_id'=>$roomid,'tel'=>$tel,'user_key'=>$userkey]];
        $sendhost=json_encode($sendhost);


        $ch=curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,'data='.$sendhost);
        $res=curl_exec($ch);
        curl_close($ch);

        $res=json_decode($res);
        if($res->code=='6000'){
            echo json_encode(['res'=>1]);
        }else{
            echo json_encode(['res'=>0]);
        }


    }

    public function UserScanPromiseBind(Request $request){
        $roomid=$request->get('room_id');
        $cellid=$request->get('cell_id');
        if(!empty($userinfo)){
            $tel=$userinfo->tel;
            $userkey=$userinfo->user_key;
        }
        if(empty($roomid)||empty($cellid)||empty($tel)||empty($userkey)){
            $this->code=15000;$this->msg='parameter error';
            $this->SendMessage();
            die();
        }
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,'data='.$sendhost);
        $res=curl_exec($ch);
        curl_close($ch);
        $res=json_decode($res);
        if($res->code=='9000'){
            echo json_encode(['res'=>1]);
        }else{
            echo json_encode(['res'=>0]);
        }

    }


}
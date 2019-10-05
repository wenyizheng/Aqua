<?php
namespace app\chatapi\controller;


use think\Controller;
use think\Db;
use think\Debug;
use think\Exception;
use think\Request;
use think\Config;
use app\common\controller\Frontend;
use EasyWeChat\Foundation\Application;
use app\chat\controller\Check;
use fast\service\Alisms;
use fast\service\Upyun;
//模型
use app\chatapi\model\ShowerUser;
use app\chatapi\model\ShowerCell;
use app\chatapi\model\ShowerRoom;
use app\chatapi\model\ShowerPromise;
use app\chatapi\model\ShowerBlock;
use app\chatapi\model\ShowerOrder;
use app\chatapi\model\ShowerAgent;
use app\chatapi\model\ShowerCoupon;
use app\chatapi\model\Area;
use app\chatapi\model\ShowerBaseconfig;

class RoomInfo extends Controller{

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
    }


    private function SendMessage(){
        $this->template=['code'=>$this->code,'msg'=>$this->msg,'content'=>$this->content];
        echo json_encode($this->template);
    }

    public function RoomCell(Request $request){

        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->room_id)&&empty($data->room_name)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            if(!empty($data->room_id)) {
                $cellinfo = ShowerCell::all(['room_id' => $data->room_id]);
            }else{
                $roominfo=ShowerRoom::get(['room_name'=>$data->room_name]);
                $cellinfo = ShowerCell::all(['room_id' => $roominfo->room_id]);
            }
            echo json_encode($cellinfo);
        }
    }

    public function RoomList(Request $request){

        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            //判断block_id是否填写
            if(empty($data->block_id)&&empty($data->block_name)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
                if (!empty($data->sex)) {
                    $roomlist = ShowerRoom::all(['block_id' => $data->block_id, 'available_sex' => $data->sex]);
                } else {
                    $roomlist = ShowerRoom::all(['block_id' => $data->block_id]);
                }
            }

            if(!empty($data->block_name)){
                $blockinfo=ShowerBlock::where('block_name',$data->block_name)->find();
                if(empty($blockinfo)){
                    die();
                }
                $block_id=$blockinfo->block_id;

                if (!empty($data->sex)) {
                    $roomlist = ShowerRoom::all(['block_id' => $block_id, 'available_sex' => $data->sex]);
                } else {
                    $roomlist = ShowerRoom::all(['block_id' => $block_id]);
                }
            }
            echo json_encode($roomlist);
        }
        if($request->method()=='POST'){
            $roomlist=ShowerRoom::all();
            echo json_encode($roomlist);
        }
    }
    public function CellObtain(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->cell_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            $status=ShowerPromise::where('cell_id',$data->cell_id)->where('begin_time','<',$time)->where('end_time','>',$time)->select();
            if($status){
                echo json_encode(['res'=>0]);
            }else{
                echo json_encode(['res'=>1]);
            }
        }
        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if(empty($data->cell_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            echo json_encode($cellinfo);
        }
    }

    public function OrderInfo(Request $request){



        if($request->method()=='GET') {
            $data=json_decode($request->get('data'));

            if(empty($data->room_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            $time=date("ymdHi",time());
            //根据浴室编号查询所有订单
            if(!empty($data->room_id)&&empty($data->status)){
                $cellinfo = ShowerPromise::all(['room_id'=>$data->room_id]);

                if(!empty($data->user)){
                }
                echo json_encode($cellinfo);
            }else{
                $cellinfo=ShowerPromise::all(['room_id'=>$data->room_id,'status'=>$data->status]);
                if(!empty($data->user)){
                }
                echo json_encode($cellinfo);
            }
        }
    }

    public function RoomInfo(Request $reqeust){

        if($reqeust->method()=='GET') {
            $data=json_decode($reqeust->get('data'));
            if(empty($data->room_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }


            $room = ShowerRoom::get(['room_id' => $data->room_id]);
            if($room) {
                $block = ShowerBlock::all($room->block_id);
                $agent = ShowerAgent::all($room->agent_id);
                $info = ['room'=>json_encode($room),'block'=>json_encode($agent),'block'=>json_encode($block)];
                echo json_encode($info);
            }else{
                $this->code=16007;$this->msg='room_id not exist';
                $this->SendMessage();
            }

        }
    }

    public function PromiseBind(Request $request){
        if($request->method()=='POST') {
            $data = json_decode($request->post('data'));
            if (empty($data->begin_time) || empty($data->end_time) || empty($data->user_id) || empty($data->cell_id)) {
                $this->code = 15000;
                $this->msg = 'parameter error';
                $this->SendMessage();
                die();
            }

            $begin_time = $data->begin_time;
            $end_time = $data->end_time;
            $nowtime =date("ymdHi",time());
            if($begin_time<$nowtime||$end_time<$nowtime){
                $this->code = 15001;
                $this->msg = 'time rule error';
                $this->SendMessage();
                die();
            }
            preg_match($zzrule, $begin_time, $begincheckresult);
            preg_match($zzrule, $end_time, $endcheckresult);
            if (empty(@$begincheckresult['0']) || empty(@$endcheckresult['0'])) {
                $this->code = 15001;
                $this->msg = 'time rule error';
                $this->SendMessage();
                die();
            }
            if ($data->end_time <= $data->begin_time) {
                $this->code = 15002;
                $this->msg = 'time queue error';
                $this->SendMessage();
                die();
            }
            if (substr($data->end_time, 4, 2) != substr($data->begin_time, 4, 2)) {
                $this->code = 15003;
                $this->msg = 'time cross day';
                $this->SendMessage();
                die();
            }
            if (substr($data->end_time, 6, 2) != substr($data->begin_time, 6, 2)) {
                $timediffer = (substr($data->end_time, 6, 2) * 60 + substr($data->end_time, 8, 2))
                    - (substr($data->begin_time, 6, 2) * 60 + substr($data->begin_time, 8, 2));
            } else {
                $timediffer = $data->end_time - $data->begin_time;
            }
            if ($timediffer > 60) {
                $this->code = 15004;
                $this->msg = 'time out 60';
                $this->SendMessage();
                die();
            }
            if (!ShowerCell::get($data->cell_id)) {
                $this->code = 15005;
                $this->msg = 'cell_id not exist';
                $this->SendMessage();
                die();
            }

            $promisecheck=1;
            foreach ($promise as $k=>$v){
                if($v->expire_time>$nowtime){
                    $promisecheck=0;
                }
            }
            if(!$promisecheck){
                $this->code=15008;$this->msg='promise is exist';
                $this->SendMessage();
                die();
            }
            $listinfo = ShowerCell::alias('cell')
                ->join('ShowerRoom room', 'cell.room_id=room.room_id')
                ->join('ShowerBlock block', 'cell.block_id=block.block_id')
                ->where("cell_id", $data->cell_id)
                ->find();
            $listinfo = json_decode($listinfo);

            if ($timediffer <= 15) {
                $expire_time = $data->end_time;
            } else {
                $expire_time = $data->begin_time + 15;
            }

            $baseconfig=ShowerBaseconfig::limit(1)->select();
            $price=$baseconfig['0']->cost_money;

            $user=ShowerUser::get(['user_id'=>$data->user_id]);
            if($user->money<$totalmoney){
                $this->code =16013;
                $this->msg='money not enough';
                $this->SendMessage();
                die();
            }


            $create_time = date("ymdHi", time());
            $info = ['begin_time' => $data->begin_time, 'end_time' => $data->end_time, 'expire_time' => $expire_time,
                'status' => 1, 'create_time' => $create_time, 'user_id' => $data->user_id, 'block_id' => $listinfo->block_id,
                'room_id' => $listinfo->room_id, 'cell_id' => $listinfo->cell_id,
            ];
            Db::startTrans();
            try {
                $res = ShowerPromise::create($info);
                if ($res) {
                    $nickname=ShowerUser::where('user_id',$data->user_id)->value('nickname');
                    $sendhost=['begin_time'=>$res->begin_time,'end_time'=>$res->end_time,'cell_id'=>$res->cell_id,
                                'nickname'=>$nickname,'status'=>$res->status,'room_id'=>$res->room_id];

                    $sendhost = json_encode(['type' => 'update', 'content' => $sendhost]);
                    $webres = $this->SendWebSocket($sendhost);
                    $webres = json_decode($webres);
                    if ($webres->res) {
                        Db::commit();
                        echo json_encode(["res" => 1]);
                    } else {
                        Db::rollback();
                        echo json_encode(["res" => 0]);
                    }
                } else {
                    echo json_encode(['res' => 0]);
                }
            }catch (\Exception $e){
                Db::rollback();
                echo json_encode(['res'=>0]);
            }
        }
    }
    public function PromiseCheck(Request $request){


        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->begin_time)||empty($data->end_time)||empty($data->cell_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            if($checktime1&&$checktime2){

                echo json_encode(['res'=>0]);
            }else{
                echo json_encode(['res'=>1]);
            }
        }
    }

    public function BlockList(Request $request){

        if($request->method()=='GET'){
            $blockinfo=ShowerBlock::all();
            echo json_encode($blockinfo);
        }

    }

    public function CellPromiseBind(Request $request){

        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if(empty($data->user_key)||empty($data->tel)||empty($data->cell_id)){
                $this->code=15000;$this->msg="parameter error";
                $this->SendMessage();
                die();
            }

            $user = ShowerUser::get(['tel' => $data->tel]);
            if(!empty($data->scan)){
                $oldpassword = $user->user_key;
                $password = $data->user_key;
            }else {
                $oldpassword = substr($user->user_key, 6);
                $password = hash('sha256', $data->user_key);
            }

            if($oldpassword != $password){
                $this->code=16012;$this->msg='user check error';
                $this->SendMessage();
                die();
            }

            $nowtime=date("ymdHi",time());
            $todaybegin=substr($nowtime,0,6).'0000';
            $todayend=substr($nowtime,0,6).'2359';


            $endmaxinterval=1800;
            $beginmaxinterval=1800;
            $interval='';
            $endpromise='';
            $beginpromise=''


            //判断当前时间是否在用
            $promisecheck=ShowerPromise::where("cell_id",$data->cell_id)
                                        ->where("begin_time",'<=',$nowtime)
                                        ->where("expire_time",'>=',$nowtime)
                                        ->where('status','1')
                                        ->find();
            if(!empty($promisecheck)){
                echo json_encode(['res'=>0]);
                die();
            }
            foreach ($promise as $k=>$v){

                $interval=(((substr($v->end_time,6,2)*60)+substr($v->end_time,8,2)-(substr($nowtime,6,2)*60)+substr($nowtime,8,2)));
                if($interval<$endmaxinterval&&$interval>=0){
                    $endmaxinterval=$interval;
                    $endpromise=$v;
                }
                $interval=((substr($v->begin_time,6,2)*60)+substr($v->begin_time,8,2))-((substr($nowtime,6,2)*60)+substr($nowtime,8,2));
                if($interval<$beginmaxinterval&&$interval>=0){
                    if($v!=$beginpromise) {
                        $beginmaxinterval = $interval;
                        $beginpromise = $v;
                    }
                }
            }
            if(empty($endpromise)||empty($beginpromise)){
                echo json_encode(['res'=>022222]);
                die();
            }

            $promiseinterval=((substr($beginpromise->begin_time,6,2)*60)+substr($beginpromise->begin_time,8,2))-((substr($endpromise->end_time,6,2)*60)+substr($endpromise->end_time,8,2));

            if($promiseinterval>30){
                echo json_encode(['res'=>03]);
                die();
            }
            $starttime=$nowtime;
            $finishtime=$beginpromise->begin_time-1;
            $expiretime=$nowtime+15;
            if($expiretime>$finishtime){
                $expiretime=$finishtime;
            }


            if(ShowerPromise::create($promisedata)){
                echo json_encode(['res'=>1,'content'=>$promisedata]);
            }else{
                echo json_encode(['res'=>05]);
            }

        }
    }

    public function RoomListCheck(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->room_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $time=date("ymdHi",time());
            $promise=ShowerPromise::where('begin_time','<=',$time)
                                    ->where('end_time','>=',$time)
                                    ->where('room_id',$data->room_id)->select();

            echo json_encode($promise);
        }
    }
    public function CouponList(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->status)||@$data->status!=0) {
                $info = ShowerCoupon::alias('coupon')
                                    ->join("ShowerCouponScene cscene","coupon.scene_id=cscene.scene_id")
                                    ->where("user_id",$data->user_id)
                                    ->select();
                echo json_encode($info);
            }else{
                $info=ShowerPromise::all(['user_id'=>$data->user_id,'status'=>$data->status]);
                echo json_encode($info);
            }
        }
    }

    public function UserPromiseList(Request $request){
        if($request->method()=='GET') {
            $data=json_decode($request->get('data'));

            if (empty($data->user_id)) {
                $this->code = 15000;
                $this->msg = 'parameter error';
                $this->SendMessage();
                die();
            }
            $time = date("ymdHi", time());
            if (isset($data->status)) {
                if ($data->status == 0) {
                    $info = ShowerPromise::alias('promise')
                        ->join('ShowerRoom room', 'room.room_id=promise.room_id')
                        ->where('user_id', $data->user_id)->where('status', '0')
                        ->select();
                    echo json_encode($info);
                } else {
                    $info = ShowerPromise::alias('promise')
                        ->join('ShowerRoom room', 'room.room_id=promise.room_id')
                        ->where('user_id', $data->user_id)->where('status', '1')
                        ->select();
                    echo json_encode($info);
                }
            } else {
                $info = ShowerPromise::alias('promise')
                    ->join('ShowerRoom room', 'room.room_id=promise.room_id')
                    ->where('user_id', $data->user_id)
                    ->select();
                echo json_encode($info);
            }
        }
    }
    public function PromiseCancel(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->user_id)||empty($data->promise_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $time=date("ymdHi",time());
            if(empty($promise)){
                echo json_encode(['res'=>0]);
                die();
            }
            Db::startTrans();
            try {
                $sendhost=['begin_time'=>$promise->begin_time,'end_time'=>$promise->end_time,'cell_id'=>$promise->cell_id,'status'=>1
                                    ,'nickname'=>$userinfo->nickname,'room_id'=>$promise->room_id];
                $sendhost=json_encode(['type'=>'cancel','content'=>$sendhost]);

                $sendres=$this->SendWebSocket($sendhost);
                $res = $promise->delete();
                if ($res&&$sendres) {
                    Db::commit();
                    echo json_encode(['res' => 1]);
                } else {
                    Db::rollback();
                    echo json_encode(['res' => 0]);
                }
            }catch(\Exception $e){
                Db::rollback();
                echo json_encode(['res' => 0]);
            }
        }
    }

    public function AreaList(Request $request){
        if($request->method()=='GET'){
            if(empty($data->level)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            if(!empty($data->pid)){
                $arealist=Area::all(['level'=>$data->level,'pid'=>$data->pid]);
                echo json_encode($arealist);
            }else {
                $arealist = Area::all(['level' => $data->level]);
                echo json_encode($arealist);
            }
        }
    }

    public function RoomCheck(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->room_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            $checkres=ShowerRoom::get(['room_id'=>$data->room_id]);
            if($checkres){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }
    public function TelPwdCheck(Request $request){
        if($request->method()=='GET') {
            $data=json_decode($request->get('data'));

            if(empty($data->tel)||empty($data->user_key)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $userinfo = ShowerUser::where("tel",$data->tel)->find();
            if(!$userinfo){
                echo json_encode(['res'=>0]);
                die();
            }
            if ($oldpassword == $password){
                echo json_encode(['res'=>1]);
            } else {
                echo json_encode(['res'=>0]);
            }
        }
    }


    public function ShowerEnd(Request $request){
        $data=$request->post('data');
        if($request->method()=='POST'){
            $data=json_decode($data);
            if(empty($data->tel)||empty($data->user_key)||empty($data->block_id)||
                empty($data->room_id)||empty($data->use_time)||empty($data->dosage)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $user = ShowerUser::where('tel',$data->tel)->find();
            if(!$user){
                $this->code=16001;$this->msg='user-tel not found';
                $this->SendMessage();
                die();
            }


            $nowtime=date("ymdHi",time())-1;

            if(empty($promiseinfo)){
                $this->code=16012;$this->msg='user check error';
                $this->SendMessage();
                die();
            }

            $postdata=['use_time'=>$data->use_time,'user_id'=>$user->user_id,'block_id'=>$data->block_id,
                        'room_id'=>$data->room_id,'cell_id'=>$promiseinfo->cell_id,'dosage'=>$data->dosage];
            $postdata=json_encode($postdata);


            $url = "https://wenyizheng.cn/fastadmin/public/index.php/chatapi/order_info/ordergengrate";
            $ch= curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$postdata);
            $res = curl_exec($ch);
            curl_close($ch);

            $res=json_decode($res);
            if(empty($res)){
                echo json_encode(['res'=>0]);
                die();
            }
            if(!empty($res->code)){
                echo json_encode(['res'=>0]);
                die();
            }
            $respromise=$res->promise;


            if($res->res==1){
                echo json_encode(['res'=>1,'content'=>$sendhost]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function UserShowerCheck(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->user_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $time=date('ymdHi',time());
            $info=ShowerPromise::where('user_id',$data->user_id)
                ->where('status','1')
                ->where('begin_time','<=',$time)
                ->where('expire_time','>=',$time)
                ->find();
            if($info){
                echo json_encode(['res'=>1,'content'=>$info]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function OpenBoxCheck(Request $request){

        if($request->method()=='POST'){
            $data=json_decode($request->post('data'));
            if(empty($data->user_key)||empty($data->tel)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }
            $user=ShowerUser::get(['tel'=>$data->tel]);

            if(empty($user)){
                $this->code=16001;$this->msg='user-tel not found';
                $this->SendMessage();
                die();
            }
            \
            if(!empty($promise)){
                echo json_encode(['res'=>1,'cell_id'=>$promise->cell_id]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

    public function orderlist(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = json_decode($request->post('data'));
            if (empty($data->user_id)) {
                $this->code = 15000;
                $this->msg = 'parameter error';
                $this->SendMessage();
                die();
            }

        }
    }

    public function SendWebSocket($data){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,'data='.$data);
        $res=curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    public function RoomBasic(Request $request){
        if($request->method()=='GET'){
            $data=json_decode($request->get('data'));
            if(empty($data->room_name)&&empty($data->room_id)){
                $this->code=15000;$this->msg='parameter error';
                $this->SendMessage();
                die();
            }

            if(!empty($roominfo)){
                echo json_encode($roominfo);
            }
        }
    }

}
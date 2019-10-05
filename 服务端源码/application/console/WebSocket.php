<?php
namespace app\Console;

use think\cache\driver\Redis;
use think\console\Command;
use think\console\Input;
use think\console\Output;

/*
 * Redis存入规则：
 *      获取上位机连接提交的room_id 和 客户端id 存入Redis字符串中
 *      key       value
 *      room_id:* *
 *      fd:*      *
 * Redis获取规则：
 *      当接受到向上位机更新数据请求时，根据请求数据中的room_id 寻找 Redis中的room_id:*的fd
 *      当上位机向WebSocket服务器发送数据时，根据客户端id（fd）寻找 Redis中的fd:* 的 room_id
 **/
class WebSocket extends Command
{
    protected $server;

    protected $message;

    protected $task_work_num;

    public $redis;

    protected $room=[];

    private $code;
    private $msg;
    private $content;
    private $template;
    private function SendMessage($response=null,$server=null,$fd=null){
        if(!is_null($response)) {
            $this->template = ['code' => $this->code, 'msg' => $this->msg, 'content' => $this->content];
            $response->end(json_encode($this->template));
        }
        if(!is_null($server)&&!is_null($fd)){
            $this->template = ['code' => $this->code, 'msg' => $this->msg, 'content' => $this->content];
            $response->push($fd,json_encode($this->template));
        }
    }

    protected function configure()
    {
        $this->setName('websocket:start')->setDescription('Start Web Socket Server!');
    }

    protected function execute(Input $input, Output $output)
    {
        $this->server = new \swoole_websocket_server('0.0.0.0', 10000);

        $this->redis=new \Redis();
        $this->redis->connect('127.0.0.1',6379);


        // 设置回调函数
        $this->server->on('Open', [$this, 'onOpen']);
        $this->server->on('Message', [$this, 'onMessage']);
        $this->server->on('Close', [$this, 'onClose']);
        $this->server->on('Request',[$this,'onRequest']);
        $this->server->start();
    }
    public function onRequest(\swoole_http_request $request,\swoole_http_response $response){

    }

    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {

        echo 'connect'.$request->fd;
    }
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        $data=json_decode($frame->data);


        if(!empty($data->room_id)){
            if(!$this->redis->exists('fd:'.$frame->fd)){
                $this->redis->set('fd:'.$frame->fd, $data->room_id);
                $this->redis->set('room_id:'.$data->room_id,$frame->fd);
                $this->redis->persist('room_id:'.$data->room_id);
                $this->redis->persist('fd:'.$frame->fd);
                $showerbeinscan=$this->ImgGenerate('http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerbegin?room_id='.$data->room_id);
                $this->message=['code'=>'20001','msg'=>'showerbegin','showerbeginscan'=>$showerbeinscan];
                $this->message=json_encode($this->message);
                $server->push($frame->fd,$this->message);

                $showerendscan=$this->ImgGenerate('http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerend?room_id='.$data->room_id);
                $this->message=['code'=>'20002','msg'=>'showerend','showerendscan'=>$showerendscan];
                $this->message=json_encode($this->message);
                $server->push($frame->fd,$this->message);

                $showeropenscan=$this->ImgGenerate('http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showeropen?room_id='.$data->room_id);
                $this->message=['code'=>'20003','msg'=>'showeropen','showeropenscan'=>$showeropenscan];
                $this->message=json_encode($this->message);
                $server->push($frame->fd,$this->message);

                $showerpromisebind=$this->ImgGenerate('https://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerpromise?room_id='.$data->room_id);
                $this->message=['code'=>'20004','msg'=>'showerpromise','showerpromisebind'=>$showerpromisebind];
                $this->message=json_encode($this->message);
                $server->push($frame->fd,$this->message);

                $this->message = ['code' => 1000, 'msg' => 'set room_id ok'];
                $this->message = json_encode($this->message);
                $server->push($frame->fd, $this->message);
            }
        }

        if(!empty($data->type)



            if(!$this->redis->exists('fd:'.$frame->fd)){
                $this->message=['code'=>1500,'msg'=>'empty room_id'];
                $this->message=json_encode($this->message);
                $server->push($frame->fd,$this->message);
            }

            switch ($data->type){
                case 'getpromise':{
                    if(!empty($data->room_id)){
                        $promise=$this->PromiseCheck($data->room_id);
                        if($promise) {
                            $this->message = ['code' => 2000, 'msg' => 'get promise ok', 'content' => $promise];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }else{
                            $this->message = ['code' => 2500, 'msg' => 'get promise error'];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }
                    }else{
                        $this->message=['code'=>35000,'msg'=>'parameter error'];
                        $this->message=json_encode($this->message);
                        $server->push($frame->fd,$this->message);
                        die();
                    }
                }break;
                case 'pwdcheck':{
                    if(!empty($data->user_key)){
                        $check=$this->PwdCheck($data->user_key);
                        if($check) {
                            $this->message = ['code' => 3000, 'msg' => 'user_key check ok', 'content' => $check];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }else{
                            $this->message = ['code' => 3500, 'msg' => 'user_key check error', 'content' => $check];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }
                    }else{
                        $this->message = ['code' => 3501, 'msg' => 'pwd parameter error'];
                        $this->message = json_encode($this->message);
                        $server->push($frame->fd, $this->message);
                    }
                }break;
                case 'telpwdcheck':{
                    if(!empty($data->tel)&&!empty($data->user_key)){
                        $check=$this->TelPwdCheck($data->tel,$data->user_key);
                        if($check) {
                            $this->message = ['code' => 4000, 'msg' => 'user_key tel check ok', 'content' => $check];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }else{
                            $this->message = ['code' => 4500, 'msg' => 'user_key tel check error', 'content' => $check];
                            $this->message = json_encode($this->message);
                            $server->push($frame->fd, $this->message);
                        }
                    }else{
                        $this->code=35000;$this->msg='parameter error';
                        $this->SendMessage($server,$frame->fd);
                    }
                }break;
                case 'getroompromise':{
                    if(!empty($data->room_id)){
                        if(!empty($data->status)){
                            $promise=$this->GetRoomPromise($data->room_id,$data->status);
                        }else {
                            $promise=$this->GetRoomPromise($data->room_id);
                        }
                        if($promise){
                            $this->message=['code'=>7000,'msg'=>'get promise success','content'=>$promise];
                            $this->message=json_encode($this->message);
                            $server->push($frame->fd,$this->message);
                        }else{
                            $this->message=['code'=>7501,'msg'=>'get promise error'];
                            $this->message=json_encode($this->message);
                            $server->push($frame->fd,$this->message);
                        }
                    }else{
                        $this->message=['code'=>35000,'msg'=>'parameter error'];
                        $this->message=json_encode($this->message);
                        $server->push($frame->fd,$this->message);
                    };break;
                }
                case 'cellpromisebind':{
                    if(empty($data->user_key)||empty($data->tel)||empty($data->cell_id)){
                        $this->message=['code'=>35000,'msg'=>'parameter error'];
                        $this->message=json_encode($this->message);
                        $server->push($frame->fd,$this->message);
                        die();
                    }

                    $res = $this->CellPromiseBind($data->user_key, $data->tel, $data->cell_id, $frame->fd);
                }break;
                case 'showerbegin':{
                    if(!empty($data->tel)&&!empty($data->user_key)){
                        $this->ShowerBegin($frame->fd, $data->tel, $data->user_key);
                    }else{
                        $this->message=['code'=>35000,'msg'=>'parameter error'];
                        $this->message=json_encode($this->message);
                        $server->push($frame->fd,$this->message);
                    }
                }break;

                case 'showerend':{
                    if(!empty($data->tel)&&!empty($data->user_key)&&!empty($data->block_id)
                        &&!empty($data->room_id)){
                        $res = $this->ShowerEnd($data->tel, $data->user_key, $data->block_id, $data->room_id, $frame->fd);
                    }else{
                        $this->message=['code'=>35000,'msg'=>'parameter error'];
                        $this->message=json_encode($this->message);
                        $server->push($frame->fd,$this->message);
                    }
                }break;
                case 'boxopen':{
                    if(!empty($data->tel)&&!empty($data->user_key)) {
                        $res = $this->BoxOpen($data->tel, $data->user_key,$frame->fd);
                    }else{
                        $this->message = ['code' => 35000, 'msg' => 'parameter error'];
                        $this->message = json_encode($this->message);
                        $server->push($frame->fd, $this->message);
                        die();
                    }
                }break;
                default:{
                    $this->message=['code'=>35001,'msg'=>'unkonw operate type'];
                    $this->message=json_encode($this->message);
                    $server->push($frame->fd,$this->message);
                }break;
            }
        }else{
            if(!empty($data->room_id)){
                if(!$this->redis->exists('fd:'.$frame->fd)){
                    //存入
                    $this->redis->set('fd:'.$frame->fd, $data->room_id);
                    $this->redis->set('room_id:'.$data->room_id,$frame->fd);
                    //获取各个页面的二维码
                    $showerbeinscan='http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerbegin?room_id='.$data->room_id;
                    $showerendscan='http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerend?room_id='.$data->room_id;
                    $showeropenscan='http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showeropen?room_id='.$data->room_id;
                    $showerpromisebind='http://wenyizheng.cn/fastadmin/public/index.php/chat/bath_info/showerpromise?room_id='.$data->room_id;
                    $this->message = ['code' => 1000, 'msg' => 'set room_id ok',
                        'content'=>['showerbeinscan'=>$showerbeinscan,'showerendscan'=>$showerendscan,'showeropenscan'=>$showeropenscan,'showerpromisebind'=>$showerpromisebind]];
                    $this->message = json_encode($this->message);
                    $server->push($frame->fd, $this->message);
                }
            }else if(!empty($data->heartbeat)){
                echo '  heart-check  ';
            }else{
                $this->message = ['code' => 10001, 'msg' => 'type empty'];
                $this->message = json_encode($this->message);
                $server->push($frame->fd, $this->message);
            }
        }
    }

    public function CheckRoomFd($roomid){
        if($this->redis->exists('room_id:'.$roomid)){
            return $this->redis->get('room_id:'.$roomid);
        }else{
            return false;
        }
    }
    public function ImgGenerate($text){
        $img = file_get_contents('http://qr.liantu.com/api.php?text='.$text);
        $imgbase = base64_encode($img);
        return $imgbase;
    }
    public function RoomCheck($room_id){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/roomcheck?data={"."room_id".":{$room_id}}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $room=curl_exec($ch);
        curl_close($ch);
        return json_decode($room)->res;
    }
    public function PromiseCheck($room_id){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/orderinfo?data={\"room_id\":\"{$room_id}\",\"status\":\"1\"}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $promise=curl_exec($ch);
        curl_close($ch);
        return json_decode($promise)->res;
    }
    public function TelPwdCheck($tel,$user_key){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/telpwdcheck?data={\"tel\":\"{$tel}\",\"user_key\":\"{$user_key}\"}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $check=curl_exec($ch);
        curl_close($ch);
        return json_decode($check)->res;
    }
    public function PwdCheck($user_key){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/pwdcheck?data={"."password".":"."{$user_key}".","."openid".":"."{openid}"."}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $check=curl_exec($ch);
        curl_close($ch);
        return json_decode($check)->res;
    }
    public function UserPromiseList($user_id){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/userpromiselist?data={\"user_id\":\"{$user_id}\",\"status\":\"1\"}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $check=curl_exec($ch);
        curl_close($ch);
        return $check;
    }
    public function GetUserInfo($tel){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/user_info/userobtain?data={\"tel\":\"".$tel."\"}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $user=curl_exec($ch);
        curl_close($ch);
        return $user;
    }
    public function TimeInterval($userinfo){
        $begin_time=$userinfo->begin_time;
        $end_time=$userinfo->end_time;
        $interval=1000*(60*60*(substr($end_time,6,2)-substr($begin_time,6,2))+60*(substr($end_time,8,2)-substr($begin_time,8,2)));
        return $interval;
    }
    public function UserShowerCheck($user_id){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/usershowercheck?data={\"user_id\":\"".$user_id."\"}");
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $user=curl_exec($ch);
        curl_close($ch);

        $user=json_decode($user);
        if($user->res==1){
            return json_encode($user->content);
        }else{
            return false;
        }
    }
    public function ShowerBegin($fd,$tel,$user_key,$scan=false,$response=''){
        if($this->TelPwdCheck($tel,$user_key)||$scan) {
            $userinfo = json_decode($this->GetUserInfo($tel));

            $usercheck=$this->UserShowerCheck($userinfo->user_id);

            if(!$usercheck){
                $this->message=['code'=>5502,'msg'=>'showerbegin is not exists'];
                $this->message=json_encode($this->message);
                $this->server->push($fd,$this->message);
                if($scan){$response->end($this->message);}
                die();
            }
            $promiseinfo = json_decode($usercheck);


            if (!empty($promiseinfo->user_id)) {
                $interval = $this->TimeInterval($promiseinfo);

                $sendhost=['begin_time'=>$promiseinfo->begin_time,'end_time'=>$promiseinfo->end_time,'cell_id'=>$promiseinfo->cell_id,
                    'nickname'=>$userinfo->nickname,'status'=>$promiseinfo->status,'room_id'=>$promiseinfo->room_id];

                $param = ['server' => $this->server, 'fd' => $fd, 'sendhost' => $sendhost, 'tel' => $tel, 'block_id' => $promiseinfo->block_id,
                    'room_id' => $promiseinfo->room_id, 'user_key' => $user_key,'scan'=>false];
                if($scan){
                    $param['scan']=true;
                    $param['response']=$response;
                }

                $nowtime=date("dhis",time());
                $secondtime=(substr($nowtime,0,2)*216000)+(substr($nowtime,2,2)*3600)+(substr($nowtime,4,2)*60)+substr($nowtime,6,2);
                $this->redis->set("timer_fd:".$fd,$secondtime);
                $this->message = ['code' => 5000, 'msg' => 'show begin', 'content' => $promiseinfo];
                $this->message = json_encode($this->message);
                $this->server->push($fd, $this->message);
                if($scan){$response->end($this->message);}
            }else{
                $this->message = ['code' => 5600, 'msg' => 'show begin'];
                $this->message = json_encode($this->message);
                $this->server->push($fd, $this->message);
                if($scan){$response->end($this->message);}
            }
        }else{
            $this->message = ['code' => 4500, 'msg' => 'user_key tel check error', 'content' => 0];
            $this->message = json_encode($this->message);
            $this->server->push($fd, $this->message);
            if($scan){$response->end($this->message);}
        }
    }
    public function ShowerEnd($tel,$user_key,$block_id,$room_id,$fd,$scan=false,$response=''){

        $nowtime=date("dhis",time());
        $endsecondtime=(substr($nowtime,0,2)*216000)+(substr($nowtime,2,2)*3600)+(substr($nowtime,4,2)*60)+substr($nowtime,6,2);
        $beginsecondtime=$this->redis->get("timer_fd:".$fd);
        $this->redis->del("timer_fd:".$fd);

        $use_time=$endsecondtime-$beginsecondtime;
        $dosage=$use_time;

        $postdata=['tel'=>$tel,'user_key'=>$user_key,'use_time'=>$use_time,'block_id'=>$block_id,
            'room_id'=>$room_id,'dosage'=>$dosage,'scan'=>false];
        if($scan){
            $postdata['scan']=true;
        }

        $postdata=json_encode($postdata);

        $url = "http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/showerend";
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$postdata);
        $res = curl_exec($ch);
        curl_close($ch);
        $res=json_decode($res);


        if(empty($res)){
            $this->message=['code'=>8500,'msg'=>'showerend error'];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
            if($scan){
                $response->end($this->message);
            }
            return 0;
        }

        if(!empty($res->code)){
            $this->message=['code'=>8500,'msg'=>'showerend error'];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
            if($scan){
                $response->end($this->message);
            }
            return 0;
        }

        if($res->res=='1'){
            $this->message=['code'=>8000,'msg'=>'showerend ok','content2'=>$res->content];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
            if($scan){
                $response->end($this->message);
            }
        }else{
            $this->message=['code'=>8500,'msg'=>'showerend error'];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
            if($scan){
                $response->end($this->message);
            }
        }
    }
    public function BoxOpen($tel,$user_key,$fd,$scan=false,$response=''){
        $postdata=['user_key'=>$user_key,'tel'=>$tel,'scan'=>$scan];
        $postdata=json_encode($postdata);

        $url = "http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/openboxcheck";
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$postdata);
        $res = curl_exec($ch);
        curl_close($ch);

        $res=json_decode($res);
        if(!empty($res->code)){
            $this->message = ['code' => 6500, 'msg' => 'boxopen error'];
            $this->message = json_encode($this->message);
            $this->server->push($fd, $this->message);
            if($scan){$response->end($this->message);}
            return 0;
        }

        if($res->res){
            $this->message = ['code' => 6000, 'msg' => 'boxopen ok','content'=>$res->cell_id];
            $this->message = json_encode($this->message);
            $this->server->push($fd, $this->message);
            if($scan){$response->end($this->message);}
            return 0;
        }else{
            $this->message = ['code' => 6500, 'msg' => 'boxopen error'];
            $this->message = json_encode($this->message);
            $this->server->push($fd, $this->message);
            if($scan){$response->end($this->message);}
            return 0;
        }
    }
    public function GetRoomPromise($room_id,$status=''){

        if(!empty($status)){
            $data=["room_id"=>$room_id,"status"=>$status,"user"=>"use"];
        }else{
            $data=["room_id"=>$room_id,"user"=>"use"];
        }
        $data=json_encode($data);
        var_dump($data);
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/orderinfo?data=".$data);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $promise=curl_exec($ch);
        curl_close($ch);

        if(!empty($promise)){

            $promise=json_decode($promise);
            if(empty($promise->code)) {
                return json_encode($promise);
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    public function CellPromiseBind($user_key,$tel,$cell_id,$fd,$scan=false,$response=''){
        $postdata=['user_key'=>$user_key,'tel'=>$tel,'cell_id'=>$cell_id,'scan'=>$scan];
        $postdata=json_encode($postdata);

        $url = "https://wenyizheng.cn/fastadmin/public/index.php/chatapi/room_info/cellpromisebind";
        $ch= curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'data='.$postdata);
        $res = curl_exec($ch);
        curl_close($ch);

        $res=json_decode($res);
        if(!empty($res->code)){
            $this->message=['code'=>9500,'msg'=>'cellpromise error'];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
            if($scan){$response->end($this->message);}
            return 0;
        }
        if($res->res==1){
            $this->message=['code'=>9000,'msg'=>'cellpromise ok','content'=>$res->content];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
        }else{
            $this->message=['code'=>9500,'msg'=>'cellpromise error'];
            $this->message=json_encode($this->message);
            $this->server->push($fd,$this->message);
        }
    }


}
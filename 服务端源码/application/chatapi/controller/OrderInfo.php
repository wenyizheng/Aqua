<?php

namespace app\chatapi\controller;


use app\chatapi\model\ShowerPayment;
use think\Controller;
use think\Db;
use think\Request;
use think\Config;
use app\common\controller\Frontend;

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
//use app\chatapi\model\ShowerPayment;
use app\chatapi\model\Area;
use app\chatapi\model\ShowerBaseconfig;
//ssasasasd
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use think\response\Json;


class OrderInfo extends Controller
{

    public $app = null;
    public $check = null;
    public $payment = null;
    private $code;
    private $msg;
    private $content;
    private $template;
    public $cost;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        new Frontend();
        $this->app = new Application(Config::get('wechat'));
        $this->payment = $this->app->payment;
    }

    private function SendMessage()
    {
        $this->template = ['code' => $this->code, 'msg' => $this->msg, 'content' => $this->content];
        echo json_encode($this->template);
    }




    public function test()
    {
        $rurl = urlencode("http://shower.peakjs.top/fastadmin/public/index.php/chatapi/order_info/test2");
        $url =
    }

    public function test2(Request $request)
    {
        if ($request->method() == 'POST') {
            var_dump($request->post());
        }
    }

    public function test3()
    {
        $time2=date('ymdHi',time());
        echo $time2+5;
    }


}
<?php
namespace app\chatapi\Controller;

use function MongoDB\BSON\toJSON;
use think\Controller;
use think\Request;
use think\Config;
use app\common\controller\Frontend;
use EasyWeChat\Foundation\Application;
use app\chat\controller\Check;
//模型
use app\chatapi\model\ShowerUser;
use app\chatapi\model\ShowerCell;
use app\chatapi\model\ShowerRoom;
use app\chatapi\model\ShowerPromise;
use app\chatapi\model\ShowerBlock;
use app\chatapi\model\ShowerOrder;
use app\chatapi\model\ShowerAgent;
use app\chatapi\model\ShowerCoupon;

class NoticeInfo extends Controller{
    public $app=null;
    public $check=null;
    public function __construct(Request $request = null){
        parent::__construct($request);
        new Frontend();
        $this->app=new Application(Config::get('wechat'));
    }

}
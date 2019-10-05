<?php

namespace app\admin\controller;

use app\admin\model\ShowerUser;
use app\common\controller\Backend;
use think\Db;

/**
 * 控制台
 *
 * @icon fa fa-dashboard
 * @remark 用于展示当前系统中的统计数据、统计报表及重要实时数据
 */
class Dashboard extends Backend
{

    /**
     * 查看
     */
    public function index()
    {
        $seventtime = \fast\Date::unixtime('day', -7);
        $paylist = $createlist = [];
        $promisenum=0;
        $moneynum=0;
        $usernum=0;
        $ordernum=0;
        /*for ($i = 0; $i < 7; $i++)
        {
            $day = date("Y-m-d", $seventtime + ($i * 86400));
            $createlist[$day] = mt_rand(20, 200);
            $paylist[$day] = mt_rand(1, mt_rand(1, $createlist[$day]));
        }*/
        $nowday=date('ymd',time());
        $order=Db::table('fa_shower_order')->where('create_time','like',$nowday.'%')->select();
        $promise=Db::table('fa_shower_promise')->where('create_time','like',$nowday.'%')->select();

        if(!empty($order)) {
            foreach ($order as $k => $v) {
                $ordernum++;
                $moneynum += $v['amount'];
            }
        }
        $user=Db::table('fa_shower_user')->select();
        if(!empty($user)) {
            foreach ($user as $k => $v) {
                $usernum++;
            }
        }
        if(!empty($promise)) {
            foreach ($promise as $k) {
                $promisenum++;
            }
        }


        $this->view->assign([
            'totaluser'          => $usernum,
            'totalviews'         => $promisenum,
            'todayorder'         => $ordernum,
            'totalorderamount'   => $moneynum,
            'sevendnu'           => '80%',
            'sevendau'           => '32%',
        ]);


        return $this->view->fetch();
    }

}

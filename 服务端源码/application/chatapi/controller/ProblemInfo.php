<?php
namespace app\chatapi\controller;

use app\chatapi\model\ShowerCell;
use think\Controller;
use think\Request;
use think\Config;
use app\common\controller\Frontend;
use EasyWeChat\Foundation\Application;
use app\chat\controller\Check;

//模型
use app\chatapi\model\ShowerUser;
USE app\chatapi\model\ShowerOpinion;
use app\chatapi\model\ShowerProblem;
use app\chatapi\model\ShowerOrderproblem;

class ProblemInfo extends Controller{

    public $app=null;
    public $check=null;
    private $code;
    private $msg;
    private $content;
    private $template;
    public function __construct(Request $request = null){
        parent::__construct($request);
        new Frontend();
        $this->app=new Application(Config::get('wechat'))
    }

    private function SendMessage(){
        $this->template=['code'=>$this->code,'msg'=>$this->msg,'content'=>$this->content];
        echo json_encode($this->template);
    }
    public function ProblemList($data='',Request $request){
        if($request->method()=='GET'){
            $data=json_decode($data);
            if(!empty($data->problem_type)){
                $probleminfo=ShowerProblem::all(['problem_type'=>$data->problem_type]);
                echo json_encode($probleminfo);
            }else{
                $probleminfo=ShowerProblem::all();
                echo json_encode($probleminfo);
            }
        }
    }

    public function ProblemSubmit(Request $request){



            $idinfo=ShowerCell::alias('cell')
                                ->join("ShowerBlock block",'cell.block_id=block.block_id')
                                ->join("ShowerRoom room",'cell.room_id=room.room_id')
                                ->join("ShowerDevice device",'cell.cell_id=device.cell_id')
                                ->join("ShowerAgent agent",'cell.agent_id=agent.agent_id')
                                ->where('cell.cell_id',$data->cell_id)
                                ->find();

            $time=date("ymdHi",time());


            $problem=['order_id'=>$data->order_id,
                      'user_id'=>$data->user_id,'block_id'=>$idinfo->block_id,'room_id'=>$idinfo->room_id,
                      'cell_id'=>$idinfo->cell_id,'device_id'=>$idinfo->device_id,'agent_id'=>$idinfo->agent_id,
                      'op_desc'=>$data->desc,'op_type'=>$data->type,'create_time'=>$time];


        }
    }


    public function OpinionSubmit(Request $request){

            }
            $time=date("ymdHi",time());
            $opinionres=ShowerOpinion::create($opinion);
            if($opinionres){
                echo json_encode(['res'=>1]);
            }else{
                echo json_encode(['res'=>0]);
            }
        }
    }

}
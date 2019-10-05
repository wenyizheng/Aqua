<?php
namespace app\chatapi\model;

use think\Model;

class ShowerPromise extends  Model{

    public function RoomName(){
        return $this->hasOne('ShowerRoom','room_id','room_id');
    }

    //获取用户预约信息
    public function scopeGet($query){
        $query->where('status','0');
    }
}
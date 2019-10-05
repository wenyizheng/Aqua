<?php

namespace app\common\behavior;

use think\Config;

class Common
{

    public function run(&$params)
    {
        $cdnurl = preg_replace("/\/(\w+)\.php$/i", '', $params->root());
        // 如果未设置__YOUPAI__则自动匹配得出
        if (!Config::get('view_replace_str.__YOUPAI__'))
        {
            Config::set('view_replace_str.__YOUPAI__', $cdnurl);
        }
        // 如果未设置cdnurl则自动匹配得出
        if (!Config::get('site.cdnurl'))
        {
            Config::set('site.cdnurl', $cdnurl);
        }
        // 如果未设置cdnurl则自动匹配得出
        if (!Config::get('upload.cdnurl'))
        {
            Config::set('upload.cdnurl', $cdnurl);
        }
        // 如果是调试模式将version置为当前的时间戳可避免缓存
        if (Config::get('app_debug'))
        {
            Config::set('site.version', time());
        }
    }

}

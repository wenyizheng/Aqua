<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:89:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/wechat/menu/index.html";i:1504708324;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1504708324;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1504708324;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1504708324;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="__YOUPAI__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__YOUPAI__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__YOUPAI__/assets/js/html5shiv.js"></script>
  <script src="__YOUPAI__/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <link href="__YOUPAI__/assets/css/wechat/menu.css?v=<?php echo $site['version']; ?>" rel="stylesheet">
<div class="panel panel-default panel-intro">
    <?php echo build_heading(); ?>

    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding">
                    <div class="weixin-menu-setting clearfix">
                        <div class="mobile-menu-preview">
                            <div class="mobile-head-title"><?php echo $site['name']; ?></div>
                            <ul class="menu-list" id="menu-list">
                                <li class="add-item extra" id="add-item">
                                    <a href="javascript:;" class="menu-link" title="添加菜单"><i class="weixin-icon add-gray"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="weixin-body">
                            <div class="weixin-content" style="display:none">
                                <div class="item-info">
                                    <form id="form-item" class="form-item" data-value="" >
                                        <div class="item-head">
                                            <h4 id="current-item-name">添加子菜单</h4>
                                            <div class="item-delete"><a href="javascript:;" id="item_delete">删除菜单</a></div>
                                        </div>
                                        <div style="margin-top: 20px;">
                                            <dl>
                                                <dt id="current-item-option"><span class="is-sub-item">子</span>菜单标题：</dt>
                                                <dd><div class="input-box"><input id="item_title" name="item-title" type="text" value=""></div></dd>
                                            </dl>
                                            <dl class="is-item">
                                                <dt id="current-item-type"><span class="is-sub-item">子</span>菜单内容：</dt>
                                                <dd>
                                                    <input id="type1" type="radio" name="type" value="click"><label for="type1" data-editing="1"><span class="lbl_content">发送消息</span></label>
                                                    <input id="type2" type="radio" name="type" value="view" ><label for="type2"  data-editing="1"><span class="lbl_content">跳转网页</span></label>
                                                    <input id="type3" type="radio" name="type" value="scancode_push"><label for="type3" data-editing="1"><span class="lbl_content">扫码推</span></label>
                                                    <input id="type4" type="radio" name="type" value="scancode_waitmsg"><label for="type4" data-editing="1"><span class="lbl_content">扫码推提示框</span></label>
                                                    <input id="type5" type="radio" name="type" value="pic_sysphoto"><label for="type5" data-editing="1"><span class="lbl_content">拍照发图</span></label>
                                                    <input id="type6" type="radio" name="type" value="pic_photo_or_album"><label for="type6" data-editing="1"><span class="lbl_content">拍照相册发图</span></label>
                                                    <input id="type7" type="radio" name="type" value="pic_weixin"><label for="type7" data-editing="1"><span class="lbl_content">相册发图</span></label>
                                                    <input id="type8" type="radio" name="type" value="location_select"><label for="type8" data-editing="1"><span class="lbl_content">地理位置选择</span></label>
                                                </dd>
                                            </dl>
                                            <div id="menu-content" class="is-item">
                                                <div class="viewbox is-view">
                                                    <p class="menu-content-tips">点击该<span class="is-sub-item">子</span>菜单会跳到以下链接</p>
                                                    <dl>
                                                        <dt>页面地址：</dt>
                                                        <dd><div class="input-box"><input type="text" id="url" name="url"></div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                                <div class="clickbox is-click" style="display: none;">
                                                    <input type="hidden" name="key" id="key" value="" />
                                                    <span class="create-click"><a href="<?php echo url('wechat.response/select'); ?>" id="select-resources"><i class="weixin-icon big-add-gray"></i><strong>选择现有资源</strong></a></span>
                                                    <span class="create-click"><a href="<?php echo url('wechat.response/add'); ?>" id="add-resources"><i class="weixin-icon big-add-gray"></i><strong>添加新资源</strong></a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="no-weixin-content">
                                点击左侧菜单进行编辑操作
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 text-center text-danger">
                            <i class="fa fa-lightbulb-o"></i> <small>可直接拖动菜单排序</small>
                        </div>
                        <div class="col-xs-8 text-center"><a href="javascript:;" id="menuSyn" class="btn btn-danger">保存并发布</a></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    var menu = <?php echo json_encode($menu, JSON_UNESCAPED_UNICODE); ?>;
    var responselist = <?php echo json_encode($responselist, JSON_UNESCAPED_UNICODE); ?>;
</script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__YOUPAI__/assets/js/require.js" data-main="__YOUPAI__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>
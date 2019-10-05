<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:88:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/area/roommsg/add.html";i:1504708324;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1504708324;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1504708324;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1504708324;}*/ ?>
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
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label for="c-agent_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Agent_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-agent_id" data-rule="required" data-db-table="agent" class="form-control selectpage" name="row[agent_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="c-room_name" class="control-label col-xs-12 col-sm-2"><?php echo __('Room_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-room_name" data-rule="required" class="form-control" name="row[room_name]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="c-block_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Block_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-block_id" data-rule="required" data-db-table="block" class="form-control selectpage" name="row[block_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label for="c-available_sex" class="control-label col-xs-12 col-sm-2"><?php echo __('Available_sex'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-available_sex" class="form-control" name="row[available_sex]" type="number" value="0">
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="__YOUPAI__/assets/js/require.js" data-main="__YOUPAI__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>
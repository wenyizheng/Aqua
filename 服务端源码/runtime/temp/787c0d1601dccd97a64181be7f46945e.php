<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:97:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/orderform/promisemsg/edit.html";i:1501766248;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1498145896;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1498145896;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1498145896;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="shortcut icon" href="__CDN__/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="__CDN__/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="__CDN__/assets/js/html5shiv.js"></script>
  <script src="__CDN__/assets/js/respond.min.js"></script>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label for="c-user_id" class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-user_id" data-rule="required" data-db-table="user" data-field="nickname" class="form-control selectpage" name="row[user_id]" type="text" value="<?php echo $row['user_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-block_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Block_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-block_id" data-rule="required" data-db-table="block" class="form-control selectpage" name="row[block_id]" type="text" value="<?php echo $row['block_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-room_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Room_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-room_id" data-rule="required" data-db-table="room" class="form-control selectpage" name="row[room_id]" type="text" value="<?php echo $row['room_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-cell_id" class="control-label col-xs-12 col-sm-2"><?php echo __('Cell_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cell_id" data-rule="required" data-db-table="cell" class="form-control selectpage" name="row[cell_id]" type="text" value="<?php echo $row['cell_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-begin_time" class="control-label col-xs-12 col-sm-2"><?php echo __('Begin_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-begin_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[begin_time]" type="text" value="<?php echo datetime($row['begin_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-end_time" class="control-label col-xs-12 col-sm-2"><?php echo __('End_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-end_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[end_time]" type="text" value="<?php echo datetime($row['end_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-expire_time" class="control-label col-xs-12 col-sm-2"><?php echo __('Expire_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-expire_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[expire_time]" type="text" value="<?php echo datetime($row['expire_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-status" class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-status" class="form-control" name="row[status]" type="number" value="<?php echo $row['status']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-create_time" class="control-label col-xs-12 col-sm-2"><?php echo __('Create_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-create_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[create_time]" type="text" value="<?php echo datetime($row['create_time']); ?>">
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
        <script src="__CDN__/assets/js/require.js" data-main="__CDN__/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>
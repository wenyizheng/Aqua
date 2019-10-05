<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/category/edit.html";i:1504708324;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1504708324;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1504708324;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1504708324;}*/ ?>
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
                                <form id="add-form" role="form" data-toggle="validator" method="POST" action="">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="type" class="control-label"><?php echo __('Type'); ?>:</label>
                <?php echo build_select('row[type]', $typelist, $row['type'], ['id'=>'c-type','class'=>'form-control selectpicker','data-rule'=>'required']); ?>
            </div>
            <div class="form-group">
                <label for="title" class="control-label"><?php echo __('Name'); ?>:</label>
                <input type="text" class="form-control" id="name" name="row[name]" value="<?php echo $row['name']; ?>" data-rule="required" />
            </div>
            <div class="form-group">
                <label for="nickname" class="control-label"><?php echo __('Nickname'); ?>:</label>
                <input type="text" class="form-control" id="nickname" name="row[nickname]" value="<?php echo $row['nickname']; ?>" data-rule="required" />
            </div>
            <div class="form-group">
                <label for="keywords" class="control-label"><?php echo __('Keywords'); ?>:</label>
                <input type="text" class="form-control" id="keywords" name="row[keywords]" value="<?php echo $row['keywords']; ?>" />
            </div>
            <div class="form-group">
                <label for="description" class="control-label"><?php echo __('Description'); ?>:</label>
                <textarea name="row[description]" id="description" class="form-control" cols="30" rows="3"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group form-inline">
                        <label for="weigh" class="control-label"><?php echo __('Weigh'); ?>:</label>
                        <input type="text" class="form-control" id="weigh" name="row[weigh]" value="<?php echo $row['weigh']; ?>" data-rule="required" size="3" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">

            <div class="form-group">
                <label for="pid" class="control-label"><?php echo __('Parent'); ?>:</label>
                <?php echo build_select('row[pid]', $parentlist, $row['pid'], ['id'=>'c-pid','class'=>'form-control selectpicker','data-rule'=>'required']); ?>
            </div>
            <div class="form-group">
                <label for="c-flag" class="control-label"><?php echo __('Flag'); ?>:</label>
                <?php echo build_select('row[flag]', ['recommend'=>__('Recommend'), 'index'=>__('Index'), 'hot'=>__('Hot')], $row['flag'], ['id'=>'c-flag','class'=>'form-control selectpicker','data-rule'=>'required']); ?>
            </div>
            <div class="form-group">
                <label for="content" class="control-label"><?php echo __('Status'); ?>:</label>
                <div>
                    <?php echo build_radios('row[status]', ['normal'=>__('Normal'), 'hidden'=>__('Hidden')], $row['status']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
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
<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:95:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/problem/problemmsg/edit.html";i:1501766506;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1498145896;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1498145896;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1498145896;}*/ ?>
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
        <label for="c-problem_title" class="control-label col-xs-12 col-sm-2"><?php echo __('Problem_title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-problem_title" data-rule="required" class="form-control" name="row[problem_title]" type="text" value="<?php echo $row['problem_title']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="c-problem_content" class="control-label col-xs-12 col-sm-2"><?php echo __('Problem_content'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-problem_content" data-rule="required" class="form-control summernote" rows="5" name="row[problem_content]" cols="50"><?php echo $row['problem_content']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="c-problem_type" class="control-label col-xs-12 col-sm-2"><?php echo __('Problem_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-problem_type" data-rule="required" class="form-control" name="row[problem_type]" type="text" value="<?php echo $row['problem_type']; ?>">
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
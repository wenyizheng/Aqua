<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/auth/rule/add.html";i:1498145896;s:86:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/layout/default.html";i:1498145896;s:83:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/meta.html";i:1498145896;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/auth/rule/tpl.html";i:1498145896;s:85:"/usr/local/http2/htdocs/fastadmin/public/../application/admin/view/common/script.html";i:1498145896;}*/ ?>
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
                                <div class="callout callout-info">
    <h4><?php echo __('Alert'); ?>!</h4>
    <?php echo __('If not necessary, use the command line to build rule'); ?>
</div>
<form id="add-form" class="form-horizontal form-ajax" role="form" data-toggle="validator" method="POST" action="">
    <div class="form-group">
        <label for="content" class="control-label col-xs-12 col-sm-2"><?php echo __('Ismenu'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[ismenu]', ['1'=>__('Yes'), '0'=>__('No')]); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="pid" class="control-label col-xs-12 col-sm-2"><?php echo __('Parent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_select('row[pid]', $ruledata, null, ['class'=>'form-control selectpicker', 'required'=>'']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="name" name="row[name]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="module" class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="title" name="row[title]" value="" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="icon" class="control-label col-xs-12 col-sm-2"><?php echo __('Icon'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group input-groupp-md">
                <input type="text" class="form-control" id="icon" name="row[icon]" value="fa fa-dot" />
                <a href="javascript:;" class="btn-search-icon input-group-addon">搜索图标</a>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="weigh" class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="weigh" name="row[weigh]" value="0" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="remark" class="control-label col-xs-12 col-sm-2"><?php echo __('Condition'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea class="form-control" id="condition" name="row[condition]"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="remark" class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea class="form-control" id="remark" name="row[remark]"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['normal'=>__('Normal'), 'hidden'=>__('Hidden')]); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <div class="col-xs-2"></div>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
<style>
    #chooseicon {
        margin:10px;
    }
    #chooseicon ul {
        margin:5px 0 0 0;
    }
    #chooseicon ul li{
        width:30px;height:30px;
        line-height:30px;
        border:1px solid #ddd;
        padding:1px;
        margin:1px;
        text-align: center;
    }
    #chooseicon ul li:hover{
        border:1px solid #2c3e50;
        cursor:pointer;
    }
</style>
<script id="chooseicontpl" type="text/html">
    <div id="chooseicon">
        <div>
            <form onsubmit="return false;">
                <div class="input-group input-groupp-md">
                    <div class="input-group-addon">搜索图标</div>
                    <input class="js-icon-search form-control" type="text" placeholder="">
                </div>
            </form>
        </div>
        <div>
            <ul class="list-inline">
                <% for(var i=0; i<iconlist.length; i++){ %>
                    <li data-font="<%=iconlist[i]%>" title="<%=iconlist[i]%>">
                    <i class="fa fa-<%=iconlist[i]%>"></i>
                </li>
                <% } %>
            </ul>
        </div>

    </div>
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
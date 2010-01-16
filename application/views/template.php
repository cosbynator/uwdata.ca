<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><?php echo html::specialchars($title) ?></title>
  <? echo html::stylesheet(array('css/reset', 'css/common'), array('screen', 'screen'), FALSE); ?>
</head>
<body>
<div id="page-wrapper">
<div id="page">
<div id="pageheader">
  <div class="fixedwidth">
    <div class="title"><a href="/"><span class="uwcolor">uw</span>data<span class="subtitle">.ca</span></a></div>
  </div>
</div>
<div id="pageheadershadow"></div>

<div class="fixedwidth">
<div id="content-frame-top"></div>
<div id="content-frame">
<div id="content">
  <?php echo $content ?>

</div><!-- content -->
</div><!-- content-frame -->
<div class="clearfix"></div>
<div id="content-frame-bottom"></div>

<div class="clearfix"></div>

</div> <!-- fixedwidth -->

<div class="clearfix"></div>
<div id="page-footer"></div>
</div> <!-- page -->

</div> <!-- pagewrapper -->

<div id="footer">
  <div class="fixedwidth">
  <div class="copyright">© Copyright 2009<br/>All content licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License</a> unless otherwise noted.</div>
  <div class="attribution">
    Rendered in {execution_time} seconds, using {memory_usage} of memory.<br/>
    Source hosted on <a href="http://github.com/jverkoey/uwdata.ca">github</a>.<br/>
    Made with the <a href="http://kohanaphp.com/">Kohana</a> framework.
  </div>
  </div>
</div>

</body>
</html>
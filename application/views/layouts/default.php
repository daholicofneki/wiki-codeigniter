<!DOCTYPE html>
<html>
    <head>
	<title><?php echo $template['title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo css('bootstrap.css') ?>
	<?php echo css('body.css') ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
	<?php require ('navbar.php');?>
	<div class="container">
	    <?php echo $template['body']; ?>
	    <?php require ('footer.php');?>
	</div>
	<?php echo js('jquery.js');?>
	<?php echo js('bootstrap/bootstrap-collapse.js');?>
	<?php echo js('bootstrap/bootstrap-transition.js');?>
	<?php echo js('bootstrap/bootstrap-dropdown.js');?>
	<?php echo js('bootstrap/bootstrap-carousel.js');?>
    </body>
</html>
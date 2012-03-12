<!DOCTYPE html>
<html>
    <head>
	<title><?php echo $template['title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo css('bootstrap.css') ?>
        <?php echo css('bootstrap-responsive.css') ?>
        <?php echo css('docs.css') ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
	<a href="https://github.com/purwandi/siberol"><img style="position: absolute; z-index: 10000; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub" /></a>
	<?php require ('navbar.php');?>
	<div class="container">
	    <?php echo $template['body']; ?>
	    <?php require ('footer.php');?>
	</div>
	<?php echo js('jquery.js');?>
	<?php echo js('bootstrap-collapse.js');?>
	<?php echo js('bootstrap-transition.js');?>
	<?php echo js('bootstrap-dropdown.js');?>
	<?php echo js('bootstrap-carousel.js');?>
	<script>
	    $(document).ready(function(){
		$('#myCarousel').carousel();
	    })
	</script>
    </body>
</html>
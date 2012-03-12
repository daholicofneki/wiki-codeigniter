<!DOCTYPE html>
<html>
    <head>
	<title>404 Page Not Found</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo css('bootstrap.css') ?>
        <?php echo css('bootstrap-responsive.css') ?>
        <?php echo css('docs.css') ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style>
            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                -webkit-box-shadow: 0 0 8px #D0D0D0;
            }
        </style>
    </head>
    <body>
	<?php require ('navbar.php');?>
	<div class="container">
            <div class="page-header">
                <h2>404 Page Not Found</h2>
            </div>
            <p>
                The page you are looking is not exist.
            </p>
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
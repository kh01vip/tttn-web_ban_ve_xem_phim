<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->

<link rel="stylesheet" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="<?php echo e(asset('backend/css/style.css')); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo e(asset('backend/css/style-responsive.css')); ?>" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- //font-awesome icons -->
<script src="<?php echo e(asset('backend/js/jquery2.0.3.min.js')); ?>"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>NHÂN VIÊN</h2>
	<?php
		$fail = Session::get('fail');
		if($fail){
			echo $fail;
			Session::put('fail',null);
		}
	?>
		<form action="<?php echo e(URL::to('/admin-dashboard')); ?>" method="post">
			<?php echo csrf_field(); ?>
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="admin_password" placeholder="MẬT KHẨU" required="">
		
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
	
</div>
</div>
<script src="<?php echo e(asset('backend/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('backend/js/jquery.nicescroll.js')); ?>"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="<?php echo e(asset('backend/js/jquery.scrollTo.js')); ?>"></script>
</body>
</html>
<?php /**PATH O:\wamp64\www\tttn-tonghop\tttn\resources\views/NV/loginAdmin.blade.php ENDPATH**/ ?>
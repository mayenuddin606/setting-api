<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
	<h2>
		<?php 
			$options = (array)get_option('reg-settings');
			$header_text = $options['header-text'];
			echo $header_text ;
		 ?>
	</h2>
	<h2>
		<a href="<?php 
		$options = (array)get_option('reg-settings');
		$facebookurl = $options['facebook-url'];
		echo $facebookurl;

		 ?>">Facebook</a>
	</h2>
	<h2>
		<?php 
		$options = (array)get_option('reg-settings');
		$copyright_text = $options['copyright-text'];
		echo $copyright_text;
		 ?>
	</h2>

</header>
<?php wp_footer(); ?>
</body>
</html>

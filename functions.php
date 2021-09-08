<?php 

function basictheme_support(){
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'basictheme_support');


//Create Menu field
function create_menu_field(){

	add_settings_section('header-option', 'Header Option', 'create_header_section_function', 'basic_theme_option');

	add_settings_field('header-text', 'Header Text', 'header_field_output_function', 'basic_theme_option', 'header-option');
	register_setting('header-option', 'reg-settings');

	add_settings_field('facebook-url', 'Facebook URL', 'facebook_output_function', 'basic_theme_option', 'header-option');
	register_setting('header-option', 'reg-settings');

	add_settings_section('footer-option', 'Footer Option', 'create_footer_section_function', 'basic_theme_option');
	add_settings_field('copyright-text', 'Copyright Text', 'Copyright_text_output_function', 'basic_theme_option', 'footer-option');
	register_setting('footer-option', 'reg-settings');

}
add_action('admin_init', 'create_menu_field');


//add header field function===========
function header_field_output_function(){
	$options = (array)get_option('reg-settings');
	$header_text = $options['header-text'];
	echo '<input class="regular-text" type="text" name="reg-settings[header-text]" value="'.$header_text.'" />';
}
//add facebook field function===========
function facebook_output_function(){
	$options = (array)get_option('reg-settings');
	$facebookurl = $options['facebook-url'];
	echo '<input class="regular-text" type="text" name="reg-settings[facebook-url]" value="'.esc_url($facebookurl).'" />';
}
//add copyright field function===========
function Copyright_text_output_function(){
	$options = (array)get_option('reg-settings');
	$copyright_text = $options['copyright-text'];
	echo '<input class="regular-text" type="text" name="reg-settings[copyright-text]" value="'.$copyright_text.'" />';
}


//add header section function===========
function create_header_section_function(){
	echo 'Update your header text';
}
//add footer section function===========
function create_footer_section_function(){
	echo 'Add your copyright text here..  cheers!!!';
}


//Add Menu item in dash board
function add_menu_in_dashboard(){
	add_menu_page('page title', 'Our Menu', 'manage_options','basic_theme_option', 'theme_option_output', 'dashicons-menu', '26');
}
add_action('admin_menu', 'add_menu_in_dashboard');


function theme_option_output(){ ?>
	<h2>Theme Options</h2>
	<?php settings_errors(); ?>
	<form action="options.php" method="POST">
		<?php 
		do_settings_sections('basic_theme_option');
		settings_fields('header-option');
		settings_fields('footer-option');

		submit_button();

		?>	
	</form>

<?php 
}

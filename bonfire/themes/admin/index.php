<?php
	// Setup our default assets to load.
	Assets::add_js( array(
		//Template::theme_url('js/jquery-1.6.4.min.js'),
		Template::theme_url('js/jquery.form.js'),
		Template::theme_url('js/ui.js'),
	),
	'external',
	true);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title><?php echo isset($toolbar_title) ? $toolbar_title .' : ' : ''; ?> <?php echo $this->settings_lib->item('site.title') ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

	<?php echo Assets::css(null, 'screen', true); ?>
	<?php echo Assets::css('960', 'screen', true); ?>

	<!-- Fix the mobile Safari auto-zoom bug -->
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() .'assets/cleditor/jquery.cleditor.css' ?>" />
	<script src="<?php echo base_url() .'bonfire/themes/admin/js/jquery-1.6.4.min.js' ?>"></script>
	<script src="<?php echo base_url() .'assets/js/head.min.js' ?>"></script>
	<script src="<?php echo base_url() .'assets/cleditor/jquery.cleditor.min.js' ?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$.cleditor.defaultOptions.width = 640;
			$.cleditor.defaultOptions.height = 320;
			if ($(".cltextarea").is("textarea")) {
				$(".cltextarea").cleditor()[0].focus();
			}
		});
    </script>

	<script>
	head.feature("placeholder", function() {
		var inputElem = document.createElement('input');
		return new Boolean('placeholder' in inputElem);
	});
	</script>
</head>
<body>
<div class="container_16">
	<noscript>
		<p>Javascript is required to use Bonfire's admin.</p>
	</noscript>

	<div id="header">

		<!-- Nav Bar -->
		<div id="toolbar">
			<div id="toolbar-right">
				<!-- <a href="<?php echo site_url(SITE_AREA .'/settings/users/edit/'. $this->auth->user_id()) ?>" id="tb_email" title="<?php echo lang('bf_user_settings') ?>"><?php echo $this->settings_lib->item('auth.use_usernames') ? ($this->settings_lib->item('auth.use_own_names') ? $this->auth->user_name() : $this->auth->username()) : $this->auth->email() ?></a>
				<a href="<?php echo site_url('logout') ?>" id="tb_logout" title="Logout">Logout</a> -->
				<a href="<?php echo site_url('users/profile'); ?>" id="toolbar_pass">Update Account/Password</a>
				&nbsp;|&nbsp;
				<a href="<?php echo site_url(SITE_AREA .'/help') ?>" id="toolbar_help" title="Help">Help</a>
				&nbsp;|&nbsp;
				<a href="<?php echo site_url('logout') ?>" id="toolbar_logout" title="Logout">Logout</a>
			</div>
			<a href="<?php echo site_url(); ?>" target="_blank"><img src="<?php echo Template::theme_url();?>images/grfx_admin_logo.png"></a>
			<div id="toolbar-title"><?php echo $this->settings_lib->item('site.title') ?> WebNet</div>

			<div id="toolbar-left">
				<?php echo context_nav('both') ?>
			</div>	<!-- /toolbar-left -->
		</div>

		<?php echo modules::run('subnav/subnav/index', $this->uri->segment(2)); ?>

		<div id="nav-bar">
			<?php if (isset($toolbar_title)) : ?>
				<!-- <h1><?php echo $toolbar_title ?></h1> -->
			<?php endif; ?>

			<?php Template::block('sub_nav', ''); ?>
		</div>
	</div> <!-- /header -->

	<br clear="all" />
	<div id="message">
		<?php echo Template::message(); ?>
	</div>

	<br clear="all" />
	<?php if (isset($message_data)) : ?>
		<?php echo modules::run('messages/messages/display', $message_data); ?>
	<?php endif; ?>
	<?php //Template::block('sys_msg', 'system_message'); ?>
	<div class="content-main <?php echo isset(Template::$blocks['nav_bottom']) ? 'with-bottom-bar' : '' ?>">
			<?php echo Template::yield_content(); ?>
	</div>

	<?php Template::block('nav_bottom', ''); ?>
</div>

	<div id="loader">
		<div class="box">
			<img src="<?php echo Template::theme_url()?>images/ajax_loader.gif" />
		</div>
	</div>

	<div id="debug"><!-- Stores the Profiler Results --></div>

	<script>
		head.js(<?php echo Assets::external_js(null, true) ?>);
		head.js(<?php echo Assets::module_js(true) ?>);
	</script>
	<?php echo Assets::inline_js(); ?>

</body>
</html>

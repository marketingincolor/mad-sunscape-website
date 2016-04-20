<div style="clear:both;"></div>

<?php $data = array(
		'footer_block_one'=>$default_footer_one, 
		'footer_block_two'=>$default_footer_two,
		'twitter_link'=>$tw_footer,
		'facebook_link'=>$fb_footer
	);
	Template::block('footer', 'home/main_footer', $data)
; ?>
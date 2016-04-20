<style>
#flex_table { margin: 0; }
#flex_table thead { background-color: #D2E3FD; }
#flex_table thead td { border-left: 1px solid #fff; padding-top:5px; padding-bottom:5px;  }
#flex_table th { font-weight: bold; }
#flex_table th.sorting_desc, #flex_table th.sorting_asc { background-color: #F5F5F5;}
</style>

<?php if ($role_id!='1') { ?>
<h1>Welcome <?php echo $role_name; ?></h1>
<?php }; ?>

<div class="grid_11">
<?php $role_switch = (($role_id == '1')||($role_id == '7')) ? 'adm' : 'reg'; ?>
<?php switch ($role_switch) {
	default : ?>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_user_page_views; ?></h3><br /><br clear="all" />
		WebNet Page Views
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_user_total_form_subs; ?></h3><br /><br clear="all" />
		Total Submissions
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><a href="stats"><?php echo $lbx_user_form_subs; ?></a></h3><br /><br clear="both" />
		Current Unread
	</div>
	<br clear="all" />

	<br /><br />
	<h3>Most Recent Form Submissions</h3>
	
	<p>
		<table id="flex_table">
			<thead>
				<tr>
					<td><b>Date/Time</b></td>
					<td><b>First Name</b></td>
					<td><b>Last Name</b></td>
					<td style="text-align:center;"><b>Details</b></td>
			</thead>
			<tbody>
			<?php
			foreach ($lbx_user_five_form_subs as $lbx_user_five_form_sub) : ?>
				<tr>
					<td><?php echo date('M j, Y  g:i a', strtotime($lbx_user_five_form_sub->datetime)); ?></td>
					<?php 
					$form_contents = json_decode($lbx_user_five_form_sub->data, true);
					while (list($key, $value) = each($form_contents)) {
						//echo '<td>'.$value.'</td>';
					} 
					echo '<td>'.$form_contents['first_name'].'</td>';
					echo '<td>'.$form_contents['last_name'].'</td>';
					?>
					<td style="text-align:center;"><a href="<?php echo site_url(SITE_AREA.'/stats/details/'.$lbx_user_five_form_sub->id) ?>"><img src="<?php echo (empty($lbx_user_all_form_sub->note) ? site_url('bonfire/themes/admin/images/grfx_view_btn.png') : site_url('bonfire/themes/admin/images/grfx_view_btn.png')); ?>"></a></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</p>
	<br /><br />
	<p>For your complete list of all submissions, <a href="<?php echo site_url(SITE_AREA.'/stats');?>">click here.</a></p>
	<br /><br />

<?php break;
    case 'adm' : ?>

	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_stats_count; ?></h3><br /><br clear="both" />
		WebNet Page Views
	</div>
		<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_subs_count; ?></h3><br /><br clear="both" />
		Total Submissions
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_unread_count; ?></h3><br /><br clear="both" />
		Current Unread
	</div>
	
	
	<div class="" style="padding: 0.5em 1em; display:inline-block; height:150px; width:350px; margin:10px; float:left; text-align:center;">
		<a href="<?php echo site_url(SITE_AREA.'/settings/users');?>"><img src="../bonfire/themes/admin/images/grfx_btn_mngusr.png"></a>
	</div>
	<div class="" style="padding: 0.5em 1em; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_user_count; ?></h3><br clear="both" />
		Total WebNet Users
	</div>
	
	<br clear="all" />
	<p>All statistics are systemwide.</p>
<?php  break;
	} ?>
	
<!-- <h1>Welcome <?php echo $this->settings_lib->item('auth.use_usernames') ? ($this->settings_lib->item('auth.use_own_names') ? $this->auth->user_name() : $this->auth->username()) : $this->auth->email() ?></h1> -->

</div>

<div class="grid_5">
	<div style="background-color: #F2F2F2;background-image: -moz-linear-gradient(center bottom , #C5C7C9 0%, #F3F3F3 100%);border-bottom: 1px solid #CCCCCC;border-top: 1px solid #CCCCCC;display: inline-block;height: 45px; margin:10px 0px 5px 0px; width:100%;">
		<h3 style="font-size:14px; font-weight:normal; padding-top:5px; text-align:center;">Sunscape Dealer Support Center</h3>
	</div>
	<br clear="all"/><br />
<?php foreach ($getfeed as $item) : ?>
	<p><a href="<?php echo $item['link'];?>" target="_blank"><?php echo $item['title'];?></a></p>
	<p><?php echo $item['pubDate'];?></p>
	<p><?php echo $item['description'];?></p>
	<p>&nbsp;</p>
<?php endforeach; ?>
</div>


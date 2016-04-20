<!-- <h1>Welcome <?php echo $this->settings_lib->item('auth.use_usernames') ? ($this->settings_lib->item('auth.use_own_names') ? $this->auth->user_name() : $this->auth->username()) : $this->auth->email() ?></h1> -->
<h1>Welcome <?php echo $role_name; ?></h1>

<!-- <div class="box rounded" style="display:inline-block; height:150px; width:150px; margin:15px; float:left; text-align:center;">
		You currently have <br /><br />
		<h3 style="display:inline; font-size:72px;"><?php echo $lbx_user_count; ?></h3><br clear="both" />
		Linbox Users.
	</div>
	<div class="box rounded" style="display:inline-block; height:150px; width:150px; margin:15px; float:left; text-align:center;">
		There have been <br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>2 ? 'font-size:54px' : 'font-size:72px' ; ?>;"><?php echo $lbx_stats_count; ?></h3><br clear="both" /> 
		Linkbox Page Views.
	</div>
		<div class="box rounded" style="display:inline-block; height:150px; width:150px; margin:15px; float:left; text-align:center;">
		There have been <br /><br />
		<h3 style="display:inline; font-size:72px;"><?php echo $lbx_subs_count; ?></h3><br clear="both" /> 
		Form Submittals.
	</div>
	<br clear="all" />

<p>Reporting Page: User ID:<?php echo $user_id; ?> / Role ID: <?php echo $role_id; ?></p> -->



<?php $role_switch = (($role_id == '1')||($role_id == '7')) ? 'adm' : 'reg'; ?>
<?php switch ($role_switch) {
	default : ?>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>; font-weight:normal;"><?php echo $lbx_user_page_views; ?></h3><br /><br clear="all" />
		WebNet Page Views
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>; font-weight:normal;"><?php echo $lbx_user_total_form_subs; ?></h3><br /><br clear="all" />
		Total Submissions
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:150px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_user_page_views)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>; font-weight:normal;"><a href="stats"><?php echo $lbx_user_form_subs; ?></a></h3><br /><br clear="both" />
		Current Unread
	</div>
	<br clear="all" />

	<br /><br />
	<h3>Most Recent Form Submissions:</h3>
	
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

	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:160px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_stats_count; ?></h3><br /><br clear="both" />
		WebNet Page Views
	</div>
		<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:160px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_subs_count; ?></h3><br /><br clear="both" />
		Total Submissions
	</div>
	<div class="box rounded" style="background-color:#F0F0F0; display:inline-block; height:150px; width:160px; margin:10px; float:left; text-align:center;">
		<br /><br /><br />
		<h3 style="display:inline; <?php echo strlen($lbx_stats_count)>3 ? 'font-size:3em' : 'font-size:54px' ; ?>;"><?php echo $lbx_user_count; ?></h3><br /><br clear="both" />
		Total Webnet User
	</div>
	
	<br clear="all" />
	<p>All Statistics are systemwide.</p>
<?php  break;
	} ?>


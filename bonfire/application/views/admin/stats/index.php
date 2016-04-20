<style>
#flex_table { margin: 0; font-size:11px; }
#flex_table thead { background-color: #D2E3FD; }
#flex_table thead td { border-left: 1px solid #fff; padding-top:5px; }
#flex_table th { font-weight: bold; }
#flex_table th.sorting_desc, #flex_table th.sorting_asc { background-color: #F5F5F5;}
</style>

<script language="javascript">
$("#selectall").live("click",function(event)
{
	if($("#selectall").hasClass('not_checked'))
	{
		$("#selectall").removeClass('not_checked');
		$(".entrynum").attr('checked',true);
	}
	else
	{
		$("#selectall").addClass('not_checked');
		$(".entrynum").attr('checked',false);
	}
});
</script>

<h1>Form Submissions</h1>
<!-- <form name="submissions"> -->
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form" name="submissions"'); ?>

<?php if (isset($lbx_user_all_form_subs) && is_array($lbx_user_all_form_subs) && count($lbx_user_all_form_subs)) : ?>
	<table id="flex_table">
		<thead>
			<tr><!-- name="master" value="" onclick="checkAll();" -->
				<td><input type="checkbox" class="entrynum not_checked" id="selectall" value="" /></td>
				<td><b>Status</b></td>
				<td><b>Date</b></td>
		<?php 
		$first = reset($lbx_user_all_form_subs);
		$form_sections = json_decode($first->data, true);
		//while (list($key, $value) = each($form_sections)) {
			//echo '<td><b>'.$key.'</b></td>';
		//}
		?>
				<td><b>First Name</b></td>
				<td><b>Last Name</b></td>
				<td><b>Phone</b></td>
				<td><b>Email</b></td>
				<td><b>Comments</b></td>

				<td><b>Notes</b></td>
			</tr>
		</thead>
		
		<tfoot></tfoot>
		
		<tbody>
		<?php
		foreach ($lbx_user_all_form_subs as $lbx_user_all_form_sub) : ?>
			<tr>
				<td><input type="checkbox" class="entrynum" name="entrynum[<?php echo $lbx_user_all_form_sub->id; ?>][id]" value="<?php echo $lbx_user_all_form_sub->id; ?>" />
				<td style="text-align:center;"><a href="<?php echo site_url(SITE_AREA.'/stats/details/'.$lbx_user_all_form_sub->id) ?>" title="<?php echo (empty($lbx_user_all_form_sub->status) ? 'unread' : 'read'); ?>"><img src="<?php echo (empty($lbx_user_all_form_sub->status) ? site_url('bonfire/themes/admin/images/grfx_icon_led_on.png') : site_url('bonfire/themes/admin/images/grfx_icon_led_off.png')); ?>"></a><span style="font-size:0px;"><?php echo (empty($lbx_user_all_form_sub->status) ? 'unread' : 'read'); ?></span></td>
				<td><?php echo date('M j, Y', strtotime($lbx_user_all_form_sub->datetime)); ?> <?php echo date('g:i a', strtotime($lbx_user_all_form_sub->datetime)); ?></td>
				<?php 
				$form_contents = json_decode($lbx_user_all_form_sub->data, true);
				//while (list($key, $value) = each($form_contents)) {
					//echo '<td>'.$value.'</td>';
				//} 
				echo '<td>'.$form_contents['first_name'].'</td>';
				echo '<td>'.$form_contents['last_name'].'</td>';
				//echo '<td>'.$form_contents['address_1'].'<br />'.(empty($form_contents['address_2'])?'':$form_contents['address_2'].'<br />').$form_contents['city'].'<br />'.$form_contents['state'].'<br />'.$form_contents['zip'].'</td>';
				echo '<td>'.$form_contents['phone'].'</td>';
				echo '<td><a href="mailto:'.$form_contents['email'].'">'.$form_contents['email'].'</a></td>';
				echo '<td style="text-align:center;"><a href="';
				echo site_url(SITE_AREA.'/stats/details/'.$lbx_user_all_form_sub->id);
				echo '"><img src="';
				echo (empty($form_contents['comments']) ? site_url('bonfire/themes/admin/images/grfx_icon_bub_off.png') : site_url('bonfire/themes/admin/images/grfx_icon_bub_on.png'));
				echo '"></a></td>';
				?>
				<td style="text-align:center;"><a href="<?php echo site_url(SITE_AREA.'/stats/details/'.$lbx_user_all_form_sub->id) ?>"><img src="<?php echo (empty($lbx_user_all_form_sub->note) ? site_url('bonfire/themes/admin/images/grfx_icon_note.png') : site_url('bonfire/themes/admin/images/grfx_icon_note_act.png')); ?>"></a></td>
			</tr>

		<?php endforeach; ?>
		
		</tbody>
	</table>
	<div>
		<b>Change status of checked items to:</b>
		<select name="selections">
			<option value="read">Read</option>
			<option value="unread">Unread</option>
			<option value="delete">Delete</option>
		</select>
		<input type="submit" name="submit" id="submit" value="Submit"  />
		<br />
		<p style="margin-top:20px;"><img src="<?php echo Template::theme_url();?>images/grfx_warning.png" style="vertical-align:middle; padding-right:10px;"><i>Note: Deleted items cannot be restored!</i></p>
	</div>
	
<?php else : ?>
	<h5>There are no Form Submissions at this time.</h5>
<?php endif; ?>

</form>
<br /><br />


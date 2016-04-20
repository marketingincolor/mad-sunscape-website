<style>
#details_table { margin: 0; }
#details_table thead { background-color: #D2E3FD; }
#details_table thead td { border-left: 1px solid #fff; padding-top:5px; }
#details_table th { font-weight: bold; }
#details_table th.sorting_desc, #details_table th.sorting_asc { background-color: #F5F5F5;}

#details_table tbody { border-top:1px solid #CCC;}
#details_table tr.odd { background-color: #D3D3D3;}
</style>

<?php if (validation_errors()) : ?>
	<div class="notification error">
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($details) ) {
	$details = (array)$details;
}
//$id = isset($pages['id']) ? "/".$pages['id'] : '';
$id = isset($details['id']) ? $details['id'] : '';
?>

	<h2><?php //echo ucfirst($details['type']); ?>Submission Details</h2>
	
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>

<table id="details_table">
<thead> </thead>
<tbody>
<tr><td>
	<!-- <div class="layout">
		<label for="status"><b>Status</b></label>
		<select name="status">
			<option value="1" SELECTED >Read</option>
			<option value="0" <?php //echo $details['status'] == '0' ? 'SELECTED' : '' ?> >Unread</option>
		</select>
	</div> -->
</td></tr>
	<?php 
	$form_contents = json_decode($details['data'], true);
	/*while (list($key, $value) = each($form_contents)) {
		if ($value) {
			if ($key != 'email') {
				echo '<tr><td><div class="layout">';
				echo '<label for="'.$key.'"><b>'.ucwords(str_replace('_', ' ', $key)).'</b></label>';
				echo '<div style="padding-top:5px; display:inline-block; width:475px;">'.$value.'</div>';
				echo '</div></td></tr>';
			} else {
				echo '<tr><td><div class="layout">';
				echo '<label for="'.$key.'"><b>'.ucwords(str_replace('_', ' ', $key)).'</b></label>';
				echo '<div style="padding-top:5px; display:inline-block; width:475px;"><a href="mailto:'.$value.'">'.$value.'</a></div>';
				echo '</div></td></tr>';
			}
		}
	}*/
	echo '<tr><td><div class="layout">';
	echo '<label for="name"><b>Name</b></label>';
	echo '<div style="padding-top:5px; display:inline-block; width:475px;">'.$form_contents['first_name'].' '.$form_contents['last_name'].'</div>';
	echo '</div></td></tr>';
	
	echo '<tr><td><div class="layout">';
	echo '<label for="email"><b>Email</b></label>';
	echo '<div style="padding-top:5px; display:inline-block; width:475px;"><a href="mailto:'.$form_contents['email'].'">'.$form_contents['email'].'</a></div>';
	echo '</div></td></tr>';

	echo '<tr><td><div class="layout">';
	echo '<label for="phone"><b>Phone</b></label>';
	echo '<div style="padding-top:5px; display:inline-block; width:475px;">'.$form_contents['phone'].'</div>';
	echo '</div></td></tr>';
	
	echo '<tr><td><div class="layout">';
	echo '<label for="comments"><b>Comments</b></label>';
	echo '<div style="padding-top:5px; display:inline-block; width:475px;">'.$form_contents['comments'].'</div>';
	echo '</div></td></tr>';
	
	?>

<tr><td>
	<div class="layout">
		<label for="datetime"><b>Date / Time</b></label>
		<div style="padding-top:5px; display:inline-block; width:475px;"><?php echo date('M j, Y  g:i a', strtotime($details['datetime'])); ?></div>
		<!-- <input type="text" name="datetime" value="<?php echo isset($details['datetime']) ? $details['datetime'] : set_value('datetime') ?>" /> -->
	</div>
</td></tr>
<tr><td><br />
	<div style="margin:0px 0px 10px 210px; width:640px; font-size:14px;">
		<img src="<?php echo Template::theme_url();?>images/grfx_warning.png" style="float:left; padding-right:10px;">If you add notes or make edits in the following textbox, be sure to save your work by clicking the "Save" button at the bottom of this page.
	</div>

	<div class="inline">
		<label for="note"><b>Notes</b></label>
		<textarea name="note" id="contents" rows="10" style="padding:0;" class="cltextarea"><?php echo isset($details['note']) ? $details['note'] : set_value('note', '') ?></textarea>
	</div>
</td></tr>

</tbody>
</table>

	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Save" /> or <?php echo anchor(SITE_AREA .'/stats', 'cancel'); ?>
	</div>

<?php echo form_close(); ?>
<br />
<hr>
<br />
	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/stats/delete/'. $id); ?>" onclick="return confirm('Are you sure you want to delete this record? This CANNOT be undone!')" >Delete Record</a>
		<h3>Delete This Record</h3>
		<p><strong>Are you sure you want to delete this record? <span style="color:red;">This action cannot be undone.</span></strong></p>
	</div>
<br />
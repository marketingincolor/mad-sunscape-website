<h1>Help</h1>

<p><a href="#" name="dshow" style="font-size:16px; text-decoration:underline;">Dashboard</a> | <a href="#" name="sshow" style="font-size:16px; text-decoration:underline;">Stats</a> | <a href="#" name="cshow" style="font-size:16px; text-decoration:underline;">Content</a></p>

<div class="grid_11" id="helpd" style="font-size:14px;">
	<img title="at-a-glance" src="<?php echo base_url(); ?>images/dash.jpg" style="display:inline; float:right;" />
	<h2>Dashboard</h2>
		<p style="display:block; width:180px;">The Sunscape Dashboard is your first page destination, where you can view current at-a-glance statistics regarding 
		your WebNet activity and discover your most recent contacts from prospects who have visited and submitted a form from 
		your WebNet site.</p>
		<br clear="all" />
	<h3>Features</h3>
		<p style="display:block;"><strong>WebNet Page Views</strong> &#8211; The total number of times your WebNet page has been viewed since inception.<br />
		<strong>Total Submissions</strong> &#8211; The total amount of active form submissions in your system, including read and 
		unread form submissions. Deleted form submission do not count towards this total.<br />
		<strong>Current Unread</strong> &#8211; New form submissions that require your attention.</p>

		<img title="at-a-glance" src="<?php echo base_url(); ?>images/at-a-glance.jpg" alt="At A Glance" style="position:relative; left:-20px;" />
		
		<p><strong>Most Recent Form Submissions</strong> &#8211; For your convenience, the 5 most recent form submissions are listed 
		on your dashboard.</p>
		
		<img title="most-recent-form-submissions" src="<?php echo base_url(); ?>images/most-recent.jpg" alt="Most Recent Form Submissions" style="position:relative; left:-20px;" />
		
		<p> </p>	
</div>
	

<div class="grid_11"  id="helps" style="display:none; font-size:14px;">
	<img title="at-a-glance" src="<?php echo base_url(); ?>images/list.jpg" style="display:inline; float:right;" />
	<h2>Stats</h2>
		<p style="display:block; width:180px;">The Statistics tab reveals a list view of all your active read and unread form submissions currently in your system. 
		You have a number of ways for you to sort and track your active leads.</p>
	<br clear="all" />
	<h3>Features</h3>
		<p><strong>View List Details</strong> &#8211; To view additional details of a particular listing, click any of the 
		following icons in an item&#8217;s row to reveal its detail page.</p>

		<table style="width:592px; display:inline-block; padding-left: 40px;" >
			<tbody>
				<tr>
					<td><img title="grfx_icon_led_on" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_led_on.png" /></td>
					<td>Status of listing is &#8220;Unread&#8221;</td>
				</tr>
				<tr>
					<td><img title="grfx_icon_led_off" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_led_off.png" /></td>
					<td>Status of listing is &#8220;Read&#8221;</td>
				</tr>
				<tr>
					<td><img title="grfx_icon_bub_on" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_bub_on.png" /></td>
					<td>Form submission contains comments from submitter.</td>
				</tr>
				<tr>
					<td><img title="grfx_icon_bub_off" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_bub_off.png" /></td>
					<td>Form submission contains no submitter comments.</td>
				</tr>
				<tr>
					<td><img title="grfx_icon_note_act" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_note_act.png" /></td>
					<td>You have added notes to the details page.</td>
				</tr>
				<tr>
					<td><img title="grfx_icon_note" src="<?php echo base_url(); ?>/bonfire/themes/admin/images/grfx_icon_note.png" /></td>
					<td>You have no notes in the details page.</td>
				</tr>
			</tbody>
		</table>

		<p><strong>Bulk Editor</strong> &#8211; Change the status of multiple listings at once. Start by checking one or more of the 
		checkboxes at the left of each listing. Then at the bottom of the Stats page, choose an action from the pulldown menu (delete, 
		read, or unread) and click the submit button. <em>Note that deleted documents cannot be restored.</em></p>
		<img title="change-status" src="<?php echo base_url(); ?>images/bulk.jpg" alt="Change Status" /><br />
</div>


<div class="grid_11" id="helpc" style="display:none; font-size:14px;">
<img title="content" src="<?php echo base_url(); ?>images/content.jpg" style="display:inline; float:right; margin-bottom:10px;" />
<img title="uri" src="<?php echo base_url(); ?>images/uri.jpg" style="display:inline; float:right;" />
	<h2>Content</h2>
		<p style="display:block; width:180px;">The WebNet tab allows you to update information on your WebNet page. The "URI" entry is actually the tail end of 
		your WebNet web address. If you choose to change this, note that you'll need to change your WebNet web address 
		anywhere you may be promoting it outside the system.</p>
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


<script>
	//if Dashboard is clicked
	$('a[name=dshow]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#helpd').show();
		$('#helps, #helpc').hide();
	});
	//if Stats is clicked
	$('a[name=sshow]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#helps').show();
		$('#helpd, #helpc').hide();
	});
	//if Content is clicked
	$('a[name=cshow]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#helpc').show();
		$('#helps, #helpd').hide();
	});
</script>
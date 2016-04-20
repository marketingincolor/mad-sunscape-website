<?php if (($current_user_roleid =='1') || /* should be || */ ($current_user_roleid =='7')) : ?>
<div class="box create rounded">
	<a class="button good" href="<?php echo site_url(SITE_AREA .'/webnet/newuser'); ?>"><?php echo 'Create New Account'; ?></a>
	<h3>Create New USER and WebNet Page</h3>
	<p>Create new USER account AND WebNet page for that user.</p>
</div>
<?php endif; ?>

<style>
#flex_table { margin: 0; }
#flex_table thead { background-color: #D2E3FD; }
#flex_table thead td { padding-top:5px; }
#flex_table th { font-weight: bold; }
#flex_table th.sorting_desc, #flex_table th.sorting_asc { background-color: #F5F5F5;}
</style>
<h1>Edit WebNet Content</h1>

<?php if (($current_user_roleid !='1') && ($current_user_roleid !='7')) : ?>
<p>The form below will allow you to edit the Content of your WebNet Page.</p>

	<?php if (validation_errors()) : ?>
	<div class="notification error">
		<p><?php echo validation_errors(); ?></p>
	</div>
	<?php endif; ?>
	<?php //var_dump($info); ?>
	<?php echo form_open_multipart($this->uri->uri_string(), 'class="constrained"'); ?>
	<div style="margin-top:5px;">
		<label for="uri">URI</label>
		<input type="text" name="uri" value="<?php echo isset($info->uri) ? $info->uri : set_value($info->uri) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_name">Business Name</label><!-- <?php echo $info->bus_name; ?> -->
		<input type="text" name="bus_name" value="<?php echo isset($info->bus_name) ? $info->bus_name : set_value($info->bus_name) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_street_1">Business Address</label>
		<input type="text" name="bus_street_1" value="<?php echo isset($info->bus_street_1) ? $info->bus_street_1 : set_value($info->bus_street_1) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_street_2">Business Address (opt)</label>
		<input type="text" name="bus_street_2" value="<?php echo isset($info->bus_street_2) ? $info->bus_street_2 : set_value($info->bus_street_2) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_city">Business City</label>
		<input type="text" name="bus_city" value="<?php echo isset($info->bus_city) ? $info->bus_city : set_value($info->bus_city) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_state_code">Business State</label>
		<input type="text" name="bus_state_code" value="<?php echo isset($info->bus_state_code) ? $info->bus_state_code : set_value($info->bus_state_code) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_zip">Business ZIP</label>
		<input type="text" name="bus_zip" value="<?php echo isset($info->bus_zip) ? $info->bus_zip : set_value($info->bus_zip) ?>" />
	</div>
	<div style="margin-top:5px;">
		<label for="bus_phone">Business Phone</label>
		<input type="text" name="bus_phone" value="<?php echo isset($info->bus_phone) ? $info->bus_phone : set_value($info->bus_phone) ?>" />
	</div>
	<?php 
	$carrier = array(
		'' => 'Choose Carrier',
		'@tmomail.net' => 'T-Mobile',
		'@vmobl.com' => 'Virgin Mobile',
		'@cingularme.com' => 'Cingular',
		'@messaging.sprintpcs.com' => 'Sprint',
		'@vtext.com' => 'Verizon',
		'@messaging.nextel.com' => 'Nextel',
		'@email.uscc.net' => 'US Cellular',
		'@tms.suncom.com' => 'SunCom',
		'@ptel.net' => 'Powertel',
		'@txt.att.net' => 'AT&T',
		'@message.alltel.com' => 'Alltel',
		'@MyMetroPcs.com' => 'Metro PCS',
		'@vmobl.com' => 'Virgin',
		'@qwestmp.com' => 'Qwest',
		'@myboostmobile.com' => 'Boost',
		'@sms.mycricket.com' => 'Cricket',
	); ?>
	<div style="margin-top:5px;">
		<fieldset style="width:620px; margin:10px 0px 0px 80px;">
			<legend>Receive SMS text messages (optional)</legend>
			<span class='smaller'>
				If you would like to receive a text notification alerting you to check your email each time a 
				form is submitted through your WebNet site, please enter your cell phone number and select your 
				cell phone carrier<span class='red'>*</span>, below.
			</span><br />
			<label for="bus_cellphone" style="width:120px;">Cellular Phone</label>
			<input type="text" name="bus_cellphone" value="<?php echo isset($info->bus_cellphone) ? $info->bus_cellphone : '' ?>" style="width:100px;" />
			<?php echo form_dropdown('bus_carrier', $carrier ,''. $info->bus_carrier . '');?><br />
			<span class='green smaller'>Enter numerals only (NO spaces or punctuation). Example: 2125551212</span><br /> 
			<span class='red smaller'>*Standard text message rates apply.</span><br /><br />
		</fieldset>
	</div>
	<div style="margin-top:5px;">
		<label for="logo">Photo/Logo</label>
		<?php echo isset($info->image) ? '<img src="'.base_url().$info->image.'" />' : 'Not Available' ?><br />
		<label for="logo">Upload New Photo/Logo</label>
		<input type="file" name="userfile" value="<?php echo isset($info->image) ? $info->image : '' ?>" /><br />
		<span>(File MUST be in JPG or PNG format, no larger than 164 pixels by 164 pixels.)</span>
	</div>
	<input type="hidden" name="image" value="<?php echo isset($info->image) ? $info->image : set_value($info->image) ?>" />
	<input type="hidden" name="active" value="<?php echo isset($info->active) ? $info->active : set_value($info->active) ?>" />
	
	<!-- <div style="margin-top:5px;">
		<label for="content">Content</label>
		<textarea rows="10" name="content"><?php //echo $info->content; ?></textarea>
	</div> -->
	<br clear="all" />
		<div class="submits">
			<input type="submit" name="submit" value="Save Settings" />
		</div>
	<?php echo form_close(); ?>

<?php elseif (($current_user_roleid =='1') || ($current_user_roleid =='7')) : ?>

<p>Choose a User's WebNet page from the listing below to edit that page's content, OR choose "edit" in the User column to alter the User's information (such as the email address for the site).</p>

<form name="webnetpages">
<table id="flex_table">
		<thead>
			<tr>
				<td><b>Business Name</b></td>
				<td><b>URI</b></td>
				<td><b>Business Address</b></td>
				<td><b>Phone</b></td>
				<td><b>Active</b></td>
                <td><b>User</b></td>
			</tr>
		</thead>
		<tfoot></tfoot>
		<tbody>
		<?php
		foreach ($info as $entry) : ?>
			<tr>
				<td><a href="<?php echo site_url(SITE_AREA.'/webnet/editpage/'.$entry->id) ?>"><?php echo $entry->bus_name; ?></a></td>
				<td><?php echo $entry->uri; ?></td>
				<td><?php echo $entry->bus_street_1.'<br />'.(empty($entry->bus_street_2)?'':$entry->bus_street_2.'<br />').$entry->bus_city.', '.$entry->bus_state_code.'<br />'.$entry->bus_zip ?></td>
				<td><?php echo $entry->bus_phone; ?></td>
				<td style="text-align:center;"><?php echo $entry->active; ?></td>
                <td style="text-align:center;"><a href="<?php echo site_url(SITE_AREA.'/settings/users/edit/'.$entry->users_id) ?>">edit</a></td>
			</tr>
		<?php endforeach; ?>
		
		</tbody>
	</table>
</form>

<?php endif; ?>
<br /><br /><br /><br />

<script type="text/javascript">
head.ready(function(){

$.fn.dataTableExt.oPagination.listbox = {
	/*
	 * Function: oPagination.listbox.fnInit
	 * Purpose:  Initalise dom elements required for pagination with listbox input
	 * Returns:  -
	 * Inputs:   object:oSettings - dataTables settings object
	 *		       node:nPaging - the DIV which contains this pagination control
	 *		       function:fnCallbackDraw - draw function which must be called on update
	 */
	"fnInit": function (oSettings, nPaging, fnCallbackDraw) {
		var nInput = document.createElement('select');
		var nPage = document.createElement('span');
		var nOf = document.createElement('span');
		nOf.className = "paginate_of";
		nPage.className = "paginate_page";
		if (oSettings.sTableId !== '') {
			nPaging.setAttribute('id', oSettings.sTableId + '_paginate');
		}
		nInput.style.display = "inline";
		nPage.innerHTML = "Page ";
		nPaging.appendChild(nPage);
		nPaging.appendChild(nInput);
		nPaging.appendChild(nOf);
		$(nInput).change(function (e) { // Set DataTables page property and redraw the grid on listbox change event.
			window.scroll(0,0); //scroll to top of page
			if (this.value === "" || this.value.match(/[^0-9]/)) { /* Nothing entered or non-numeric character */
				return;
			}
			var iNewStart = oSettings._iDisplayLength * (this.value - 1);
			if (iNewStart > oSettings.fnRecordsDisplay()) { /* Display overrun */
				oSettings._iDisplayStart = (Math.ceil((oSettings.fnRecordsDisplay() - 1) / oSettings._iDisplayLength) - 1) * oSettings._iDisplayLength;
				fnCallbackDraw(oSettings);
				return;
			}
			oSettings._iDisplayStart = iNewStart;
			fnCallbackDraw(oSettings);
		}); /* Take the brutal approach to cancelling text selection */
		$('span', nPaging).bind('mousedown', function () {
			return false;
		});
		$('span', nPaging).bind('selectstart', function () {
			return false;
		});
	},
	
	/*
	 * Function: oPagination.listbox.fnUpdate
	 * Purpose:  Update the listbox element
	 * Returns:  -
	 * Inputs:   object:oSettings - dataTables settings object
	 *		       function:fnCallbackDraw - draw function which must be called on update
	 */
	"fnUpdate": function (oSettings, fnCallbackDraw) {
		if (!oSettings.aanFeatures.p) {
			return;
		}
		var iPages = Math.ceil((oSettings.fnRecordsDisplay()) / oSettings._iDisplayLength);
		var iCurrentPage = Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength) + 1; /* Loop over each instance of the pager */
		var an = oSettings.aanFeatures.p;
		for (var i = 0, iLen = an.length; i < iLen; i++) {
			var spans = an[i].getElementsByTagName('span');
			var inputs = an[i].getElementsByTagName('select');
			var elSel = inputs[0];
			if(elSel.options.length != iPages) {
				elSel.options.length = 0; //clear the listbox contents
				for (var j = 0; j < iPages; j++) { //add the pages
					var oOption = document.createElement('option');
					oOption.text = j + 1;
					oOption.value = j + 1;
					try {
						elSel.add(oOption, null); // standards compliant; doesn't work in IE
					} catch (ex) {
						elSel.add(oOption); // IE only
					}
				}
				spans[1].innerHTML = "&nbsp;&nbsp;of&nbsp;&nbsp;" + iPages;
			}
		  elSel.value = iCurrentPage;
		}
	}
};

$("#flex_table").dataTable({
		//"sDom": 'rt<"top"fpi>',
		"sDom": '<"top"iplf<"clear">>rt<"bottom">',
		"sPaginationType": "two_button",
		"bProcessing": true,
		"bLengthChange": true,
		"iDisplayLength": 10,
		"aaSorting": [[0,'asc']],
		"bAutoWidth": false,
		"aoColumns": [
			{ "sWidth": "25%" },
			null,
			null,
			null,
			null,
            null
		]
});

});

</script>



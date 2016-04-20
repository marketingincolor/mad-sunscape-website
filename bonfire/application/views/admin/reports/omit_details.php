<h1>Reports Details Page - <?php echo ucfirst($type); ?></h1>

<?php 
switch ($type) {
    case "views" : ?>

	<?php if (isset($lbx_user_all_page_views) && is_array($lbx_user_all_page_views) && count($lbx_user_all_page_views)) : ?>
		<h2>Page Views</h2>
		<table>
			<thead>
				<tr>
					<th>table header here?</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td><b>ip_address</b></td>
					<td><b>datetime</b></td>
					<td><b>something</b></td>
					<td><b>other</b></td>
				</tr>
			<?php
			foreach ($lbx_user_all_page_views as $lbx_user_all_page_view) : ?>
				<tr>
					<td><?php echo (empty($lbx_user_all_page_view->ip_address) ? '-' : $lbx_user_all_page_view->ip_address); ?></td>
					<td><?php echo (empty($lbx_user_all_page_view->datetime) ? '-' : $lbx_user_all_page_view->datetime); ?></td>
					<td><?php echo (empty($lbx_user_all_page_view->something) ? '-' : $lbx_user_all_page_view->something); ?></td>
					<td><?php echo (empty($lbx_user_all_page_view->other) ? '-' : $lbx_user_all_page_view->other); ?></td>
				</tr>
	
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

<?php 
        break;
    case "forms" : ?>

	<?php if (isset($lbx_user_all_form_subs) && is_array($lbx_user_all_form_subs) && count($lbx_user_all_form_subs)) : ?>
		<h2>Form Submits</h2>
		<table>
			<thead>
				<tr>
					<th>table header here?</th>
			</tr>
			</thead>
			<tbody>
				<tr>
					<td><b>datetime</b></td>
					<td><b>type</b></td>
					<td><b>data</b></td>
				</tr>
			<?php
			foreach ($lbx_user_all_form_subs as $lbx_user_all_form_sub) : ?>
				<tr>
					<td><?php echo (empty($lbx_user_all_form_sub->datetime) ? '-' : $lbx_user_all_form_sub->datetime); ?></td>
					<td><?php echo (empty($lbx_user_all_form_sub->type) ? '-' : $lbx_user_all_form_sub->type); ?></td>
					<td><?php echo (empty($lbx_user_all_form_sub->data) ? '-' : var_dump(json_decode($lbx_user_all_form_sub->data, true))); ?></td>
				</tr>
	
			<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

	
<?php 
        break;
    case "other" : ?>

<?php 
        break;
} ?>
	
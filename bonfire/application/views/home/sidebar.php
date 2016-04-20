<style>
	#side-outer { max-height:700px; width:220px; background-color:#FFEDBF; }
	#side-inner { padding-left:10px; max-height:580px; width:210px; overflow:auto; color:#2C4F69; }
	#side-inner a { color:#2C4F69; text-decoration:underline; margin-top:3px; display:inline-block; font-size:12px; }
</style>

<div id="side-outer">
	<img src="./uploads/locator.jpg" /><br />
	<div id="side-inner">
	<?php if (isset($records) && is_array($records) && count($records)  ) : ?>
		<?php $arr = array();
		$all_states = config_item('address.states');
		$fortyeight = $all_states['US'];
        $namerica = $all_states['CA'];
        $states = $fortyeight + $namerica;
		foreach ($records as $record) {
			$record = (array)$record;
		    $arr[$record['bus_state_code']][] = '<a href="'.$record['uri'].'">'.$record['bus_name'].'</a><br />';
        }
		foreach ($arr as $statecode => $name) {
            if ($states[$statecode]) {
		    echo '<p><b>'.$states[$statecode].'</b><br />';
		        foreach ($name as $key => $bus_name) {
		            echo $bus_name;
		        }
		    echo '</p>';
            }
        }?>
	<?php endif; ?>
	</div>

</div>
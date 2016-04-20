	<?php if (isset($records) && is_array($records) && count($records)  ) : ?>
		<?php $arr = array();
        $all_states = config_item('address.states');
        $states = $all_states['US'];
        natsort($states);//sets content of states array to be in order by name, not abbreviation
		foreach ($records as $record) {
			$record = (array)$record;
            $this_state = $states[$record['bus_state_code']];
            //$arr[$record['bus_state_code']][$record['bus_city']][] = '<a href="'.$record['uri'].'">'.$record['bus_name'].'</a>';
            $arr[$this_state][$record['bus_city']][] = '<a href="'.$record['uri'].'">'.$record['bus_name'].'</a>';
        }
        ksort($arr);
        foreach ($arr as $state => $cities) {
            //if ($states[$state]) {
            //echo '<p><b>'.$states[$state].'</b><br />';
            if ($state) {
                echo '<div><h4>'.strtoupper($state).'</h4><hr><br />';
                ksort($cities);
                foreach ($cities as $city => $urls) {
                    echo '<b>'.$city.'</b><br />';
                    ksort($urls);
                    foreach ($urls as $url) {
                        echo '&nbsp;-&nbsp;'.$url.'<br />';
                    }
                    echo '<br />';
                }
                echo '</div>';
            }
        }?>
	<?php endif; ?>

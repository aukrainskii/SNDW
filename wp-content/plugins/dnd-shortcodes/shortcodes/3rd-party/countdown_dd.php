<?php

/*********** Shortcode: Countdown ************************************************************/

$ABdevDND_shortcodes['countdown_dd'] = array(
	'attributes' => array(
		'year_number' => array(
			'description' => esc_attr__('Year', 'dnd-shortcodes'),
			'info' => esc_attr__('Enter the year of date to countdown to (e.g. 2015)', 'dnd-shortcodes'),
		),
		'month_number' => array(
			'description' => esc_attr__('Month', 'dnd-shortcodes'),
			'info' => esc_attr__('Select a month of date to countdown to', 'dnd-shortcodes'),
			'type' => 'select',
			'values' => array(
				'01' => esc_attr__('January', 'dnd-shortcodes'),
				'02' => esc_attr__('February', 'dnd-shortcodes'),
				'03' => esc_attr__('March', 'dnd-shortcodes'),
				'04' => esc_attr__('April', 'dnd-shortcodes'),
				'05' => esc_attr__('May', 'dnd-shortcodes'),
				'06' => esc_attr__('June', 'dnd-shortcodes'),
				'07' => esc_attr__('July', 'dnd-shortcodes'),
				'08' => esc_attr__('August', 'dnd-shortcodes'),
				'09' => esc_attr__('September', 'dnd-shortcodes'),
				'10' => esc_attr__('October', 'dnd-shortcodes'),
				'11' => esc_attr__('November', 'dnd-shortcodes'),
				'12' => esc_attr__('December', 'dnd-shortcodes'),
				),
		),
		'day_number' => array(
			'description' => esc_attr__('Day', 'dnd-shortcodes'),
			'info' => esc_attr__('Enter the day of date to countdown to (1-31)', 'dnd-shortcodes'),
		),
		'hour_number' => array(
			'description' => esc_attr__('Hours', 'dnd-shortcodes'),
			'info' => esc_attr__('Enter the hour of time to countdown to in 24h format (0-24)', 'dnd-shortcodes'),
		),
		'minute_number' => array(
			'description' => esc_attr__('Minutes', 'dnd-shortcodes'),
			'info' => esc_attr__('Enter the minute of time to countdown to (0-59)', 'dnd-shortcodes'),
		),
		'seconds_number' => array(
			'description' => esc_attr__('Seconds', 'dnd-shortcodes'),
			'info' => esc_attr__('Enter the second of time to countdown to (0-59)', 'dnd-shortcodes'),
		),
		'style' => array(
			'description' => esc_attr__('Style', 'dnd-shortcodes'),
			'type' => 'select',
			'values' => array(
				'style_1' => esc_attr__('Simple', 'dnd-shortcodes'),
				'style_2' => esc_attr__('Flip Numbers', 'dnd-shortcodes'),
			),
		),
		'hide_expired_counters' => array(
			'description' => esc_attr__('Hide expired counters', 'dnd-shortcodes'),
			'info' => esc_attr__("Don't show year, month or day counters if they have expired (e.g. hide year if it is 00)", 'dnd-shortcodes'),
			'type' => 'checkbox',
		),
		'class' => array(
			'description' => esc_attr__('Class', 'dnd-shortcodes'),
			'info' => esc_attr__('Additional custom classes for custom styling', 'dnd-shortcodes'),
		),
	),
	'description' => esc_attr__('Countdown', 'dnd-shortcodes')
);
function ABdevDND_countdown_dd_shortcode( $attributes, $content = null ) {
	extract(shortcode_atts(ABdevDND_extract_attributes('countdown_dd'), $attributes));

	$count_down_string = esc_attr($year_number) . "/" . esc_attr($month_number) . "/" . esc_attr($day_number) . " " . esc_attr($hour_number) . ":" . esc_attr($minute_number) . ":" . esc_attr($seconds_number); 

	$year_hide = $month_hide = $day_hide = '';
	if($hide_expired_counters==1){
		$year_hide = ($year_number == date('Y')) ? ' hide_expired' : '';
		$month_hide = ($year_number == date('Y') && $month_number == date('m')) ? ' hide_expired' : '';
		$day_hide = ($year_number == date('Y') && $month_number == date('m') && $day_number == date('d')) ? ' hide_expired' : '';
	}

	if($style=='style_1'){
		$return ='<div class="dnd_countdown simple_style '.esc_attr($class).'" data-value="'.esc_attr($count_down_string).'">
			<div class="dnd_countdown_inner'.esc_attr($year_hide).'"><div class="simple countdown year"></div><span data-singular="'.esc_attr__('Year', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Years', 'dnd-shortcodes').'">'.esc_attr__('Years', 'dnd-shortcodes').'</span></div>
			<div class="dnd_countdown_inner'.esc_attr($month_hide).'"><div class="simple countdown month"></div><span data-singular="'.esc_attr__('Month', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Months', 'dnd-shortcodes').'">'.esc_attr__('Months', 'dnd-shortcodes').'</span></div>
			<div class="dnd_countdown_inner'.esc_attr($day_hide).'"><div class="simple countdown day"></div><span data-singular="'.esc_attr__('Day', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Days', 'dnd-shortcodes').'">'.esc_attr__('Days', 'dnd-shortcodes').'</span></div>
			<div class="dnd_countdown_inner"><div class="simple countdown hour"></div><span data-singular="'.esc_attr__('Hour', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Hours', 'dnd-shortcodes').'">'.esc_attr__('Hours', 'dnd-shortcodes').'</span></div>
			<div class="dnd_countdown_inner"><div class="simple countdown minute"></div><span data-singular="'.esc_attr__('Minute', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Minutes', 'dnd-shortcodes').'">'.esc_attr__('Minutes', 'dnd-shortcodes').'</span></div>
			<div class="dnd_countdown_inner"><div class="simple countdown second"></div><span data-singular="'.esc_attr__('Second', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Seconds', 'dnd-shortcodes').'">'.esc_attr__('Seconds', 'dnd-shortcodes').'</span></div>
		</div>';
	
		return $return;
	} else{
		$return ='<div class="dnd_countdown flip_style '.esc_attr($class).'" data-value="'.esc_attr($count_down_string).'">
					<div class="time flip_element year flip'.esc_attr($year_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Year', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Years', 'dnd-shortcodes').'">'.esc_attr__('Years', 'dnd-shortcodes').'</span>
					</div>
					<div class="time flip_element month flip'.esc_attr($month_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Month', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Months', 'dnd-shortcodes').'">'.esc_attr__('Months', 'dnd-shortcodes').'</span>
					</div>
					<div class="time flip_element day flip'.esc_attr($day_hide).'">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Day', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Days', 'dnd-shortcodes').'">'.esc_attr__('Days', 'dnd-shortcodes').'</span>
					</div>
					<div class="time flip_element hour flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Hour', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Hours', 'dnd-shortcodes').'">'.esc_attr__('Hours', 'dnd-shortcodes').'</span>
					</div>
					<div class="time flip_element minute flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Minute', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Minutes', 'dnd-shortcodes').'">'.esc_attr__('Minutes', 'dnd-shortcodes').'</span>
					</div>
					<div class="time flip_element second flip">
						<div class="count curr top">00</div>
						<div class="count next top">00</div>
						<div class="count next bottom">00</div>
						<div class="count curr bottom">00</div>
						<span data-singular="'.esc_attr__('Second', 'dnd-shortcodes').'" data-plural="'.esc_attr__('Seconds', 'dnd-shortcodes').'">'.esc_attr__('Seconds', 'dnd-shortcodes').'</span>
					</div>
				</div>';

		return $return;
	}

}



<?php 

global $vozx_options;

if(isset($vozx_options['exchange_column_number']) && $vozx_options['exchange_column_number'] != ''){ 
	
	if($vozx_options['exchange_column_number'] == '2'){
		$custom_css.= '
		#it-exchange-store .it-exchange-products li{width:48.59%; margin-right:2.5%;}
		#it-exchange-store .it-exchange-products li:nth-child(2n+1) {margin-right: 2.5%; clear:none;}
		#it-exchange-store .it-exchange-products li:nth-child(2n) {margin-right: 0%;}
		';
	}



	if($vozx_options['exchange_column_number'] == '3'){
		$custom_css.= '
		#it-exchange-store .it-exchange-products li{width:31.46%; margin-right:2.5%;}
		#it-exchange-store .it-exchange-products li:nth-child(2n+1) {margin-right: 2.5%; clear:none;}
		#it-exchange-store .it-exchange-products li:nth-child(3n) {margin-right: 0%;}
		';
	}

	if($vozx_options['exchange_column_number'] == '4'){
		$custom_css.= '
		#it-exchange-store .it-exchange-products li{width:22.89%; margin-right:2.5%;}
		#it-exchange-store .it-exchange-products li:nth-child(2n+1) {margin-right: 2.5%; clear:none;}
		#it-exchange-store .it-exchange-products li:nth-child(4n) {margin-right: 0%;}
		';
	}	

	if($vozx_options['exchange_column_number'] == '5'){
		$custom_css.= '
		#it-exchange-store .it-exchange-products li{width:17.75%; margin-right:2.5%;}
		#it-exchange-store .it-exchange-products li:nth-child(2n+1) {margin-right: 2.5%; clear:none;}
		#it-exchange-store .it-exchange-products li:nth-child(5n) {margin-right: 0%;}
		';
	}

	
}




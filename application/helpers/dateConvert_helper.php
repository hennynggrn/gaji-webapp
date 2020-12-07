<?php 

function fullConvertIDN($date, $short = FALSE, $day = TRUE){
	$day_name = date('l', strtotime($date));
	switch ($day_name) {
		case 'Sunday':
			$f_day_name = 'Minggu';			
			$s_day_name = 'Min';
			break;
		case 'Monday':
			$f_day_name = 'Senin';			
			$s_day_name = 'Sen';
			break;
		case 'Tuesday':
			$f_day_name = 'Selasa';			
			$s_day_name = 'Sel';
			break;
		case 'Wednesday':
			$f_day_name = 'Rabu';			
			$s_day_name = 'Rab';
			break;
		case 'Thursday':
			$f_day_name = 'Kamis';			
			$s_day_name = 'Kam';
			break;
		case 'Friday':
			$f_day_name = "Jum'at";			
			$s_day_name= "Jum";
			break;
		case 'Saturday':
			$f_day_name = 'Sabtu';			
			$s_day_name = 'Sab';
			break;
	}
	$month = array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$explode = explode('-', $date);

	if (($short == TRUE) && ($day == TRUE)) {
		return $s_day_name.', '.$explode[2].' '.$month[(int)$explode[1]].' '.$explode[0];
	} 
	if (($short == FALSE) && ($day == TRUE)){
		return $f_day_name.', '.$explode[2].' '.$month[(int)$explode[1]].' '.$explode[0];
	} 
	if (($day == FALSE) && ($short == NULL)) {
		return $explode[2].' '.$month[(int)$explode[1]].' '.$explode[0];
	}
}

function month($date){
	$month = array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$explode = explode('-', $date);
	return $month[(int)$explode[1]];
}

function day($date){
	$day_name = date('l', strtotime($date));
	switch ($day_name) {
		case 'Sunday':
			$day_name = 'Minggu';			
			break;
		case 'Monday':
			$day_name = 'Senin';			
			break;
		case 'Tuesday':
			$day_name = 'Selasa';			
			break;
		case 'Wednesday':
			$day_name = 'Rabu';			
			break;
		case 'Thursday':
			$day_name = 'Kamis';			
			break;
		case 'Friday':
			$day_name = "Jum'at";			
			break;
		case 'Saturday':
			$day_name = 'Sabtu';			
			break;
	}
	return $day_name;
}

?>

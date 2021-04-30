<?php

$json = file_get_contents('./images/hotelAvailability_Response (2).json');
$obj  = json_decode($json, true);
// echo '<pre>' . print_r($obj) . '</pre>';
$data = $obj['result'];

// echo '<pre>' . print_r($data) . '</pre>';
$hotel = array();
foreach ($data as $a)
	{
        // echo $a['stars'];
        // die();
		$r=array();
						
		$r=$a['stars'];
		array_push($hotel, $r);
	}

    echo '<pre>' . print_r($hotel) . '</pre>';




?>
<?php 

$config['g_api_key'] = 'AIzaSyBRAvuU36EwEbTCDKm71c-DLy7I4UBJmGk';

$config['start'] = array();
$config['name'] = array();
$config['flight_no'] = array();
$config['seat_no'] = array();
$config['passport_no'] = array();
$config['pk_addr'] = array();
$config['mobile'] = array();
$config['other_med_cond'] = array();
$config['date_signed'] = array();

// sk == field name
$config['forms']['pcaa']['start'] = array('sk' => 'International ','ek' => 'Form');

$config['forms']['pcaa']['name'] = array('sk' => 'I, Mr/','ek' => '_ Flight No.');

$config['forms']['pcaa']['flight_no'] = array('sk' => 'Flight No. ','ek' => 'dated');

$config['forms']['pcaa']['dated'] = array('sk' => 'dated','ek' => 'Seat No.');

$config['forms']['pcaa']['seat_no'] = array('sk' => 'Seat No.','ek' => 'Passport No.');

$config['forms']['pcaa']['passport_no'] = array('sk' => 'Passport No.','ek' => 'and CN');

$config['forms']['pcaa']['cnic_poc'] = array('sk' => 'POC No.','ek' => 'Address in Pakistan');
$config['forms']['pcaa']['pk_addr'] = array('sk' => 'Address in Pakistan','ek' => 'Mobile Phone No');
// $config['forms']['pcaa']['pk_addr'] = array('sk' => 'Address in Pakistan','ek' => 'Mobile Phone No');
$config['forms']['pcaa']['mobile'] = array('sk' => 'Mobile Phone No','ek' => 'do hereby');
$config['forms']['pcaa']['other_med_cond'] = array('sk' => 'Any other medical condition:','ek' => '3. That I have/have');
$config['forms']['pcaa']['date_signed'] = array('sk' => 'Date:','ek' => 'Signature:');
<?php

require  'Medoo.php';

use Medoo\Medoo;

 
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'db',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '1234',
 
]);

//echo'<pre>';
//print_r($database->info());
//echo '</pre>';





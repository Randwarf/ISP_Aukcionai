<?php

class config {
	const DB_SERVER    = '127.0.0.1';
	const DB_NAME      = 'isp_aukcionai';
	const DB_USERNAME  = 'root';
	const DB_PASSWORD  = '';
}

$db = mysqli_connect(config::DB_SERVER, config::DB_USERNAME, config::DB_PASSWORD, config::DB_NAME);
if(!$db){ die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($db)); }
?>

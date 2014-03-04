<?php 

$config = [
	'from' => [
		'address' => 's5@localhost',
		'name' => 's5'
	],
	'reply_to' => 's5@localhost',
	'api_key' => '',
	'domain' => 'localhost',
	'force_from_address' => false,
];

$local_config_file = app_path().DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'.local.json';
if (file_exists($local_config_file)) {
    $config_local = json_decode(file_get_contents($local_config_file), true)['mail'];
    $config = array_merge($config, $config_local);
}

return $config;
<?php

return [

	'active' => env('CHANNEL_ACTIVE'),

	'driver' => 'file',

	'drivers' => [
		'file' => [
			'channel_file_name' => 'channel_file_name.txt',
		],
	],
];

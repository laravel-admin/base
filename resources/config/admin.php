<?php

return [

	'route_group' => ['domain'=>env('ADMIN_URL'), 'as'=>'admin.'],

	'route_middleware' => ['middleware'=>'auth.admin'],

	'js' => ['/js/app.js'],
	'css' => ['/css/app.css'],

	'roles'	=>	[
		'admin', 'editor','author','user','api'
	],

	'canlogin' => ['admin','editor'],

	'menu'	=>	[],
];

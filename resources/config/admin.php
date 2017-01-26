<?php

return [

	'route_group' => ['domain'=>env('ADMIN_URL'), 'as'=>'admin.'],

	'route_middleware' => ['middleware'=>'auth.admin'],

	'roles'	=>	[
		'admin', 'editor','author','user','api'
	],

	'canlogin' => ['admin','editor'],

	'menu'	=>	[

	],
];

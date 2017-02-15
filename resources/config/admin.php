<?php

return [
    // Route group settings
	'routeGroup' => ['domain' => env('ADMIN_URL'), 'as' => 'admin.'],

    // Define which middleware the admin uses
	'routeMiddleware' => ['middleware' => 'auth.admin'],

    // Assets
	'js'  => ['/js/app.js'],
	'css' => ['/css/app.css'],

    // Simple roles
	'roles'	=> [
		'admin', 'editor', 'author', 'user', 'api'
	],

    // Define who can login into the admin
	'canLogin' => ['admin', 'editor'],

    // Simple menu
	'menu'	=>	[],
];

<?php

// Salt Generator: https://api.wordpress.org/secret-key/1.1/salt/

$sites  =  [
	'sitea.example.com'  =>  [
		'wpcontentdir'    =>  '/var/www/wphosts/sites/sitea.example.com', // Needs to be a full path to the site directory no trailing slash
		'dbhost'          =>  'localhost',
		'dbuser'          =>  'sitea',
		'dbpass'          =>  'siteadbpass',
		'dbname'          =>  'siteadb',
		'dbprefix'        =>  'wp_',
		'dbcharset'       =>  'utf8',
		'dbcollate'       =>  '',
		'wpdebug'         =>  false,
		'wpcache'         =>  true, // needs to be true to make object caching work
		'supercachehome'  =>  '/var/www/wphosts/sites/sitea.majemedia.com/cache/', // WP SuperCache uses a trailing slash on a full server path
		// TODO: Add W3 Total Cache wp-config.php stuff
		'authkey'         =>  '',
		'secureauthkey'   =>  '',
		'loggedinkey'     =>  '',
		'noncekey'        =>  '',
		'authsalt'        =>  '',
		'secureauthsalt'  =>  '',
		'loggedinsalt'    =>  '',
		'noncesalt'       =>  '',
	],
];

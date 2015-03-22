<?php

// Salt Generator: https://api.wordpress.org/secret-key/1.1/salt/

$sites  =  [
	'sitea.example.com'  =>  [
		// This tells WordPress where to look for your wp-content folder contents (doesn't need to actually be wp-content)
		'wpcontentdir'    =>  __DIR__ . '/sites/sitea.example.com', // Needs to be a full path to the site directory no trailing slash
		// DB Stuff
		'dbhost'          =>  'localhost',
		'dbuser'          =>  'sitea',
		'dbpass'          =>  'siteadbpass',
		'dbname'          =>  'siteadb',
		'dbprefix'        =>  'wp_',
		'dbcharset'       =>  'utf8',
		'dbcollate'       =>  '',
		// WordPress settings
		'wpdebug'         =>  false,
		'wpcache'         =>  true, // needs to be true to make object caching work
		// Salts below
		'authkey'         =>  '',
		'secureauthkey'   =>  '',
		'loggedinkey'     =>  '',
		'noncekey'        =>  '',
		'authsalt'        =>  '',
		'secureauthsalt'  =>  '',
		'loggedinsalt'    =>  '',
		'noncesalt'       =>  '',
		// Put custom stuff below here and tie into shared_core/wp-config.php with the value
	],
];

$plugin  =  [
	// This space reserved for individual plugin requirements that aren't/shouldn't be overwritten by individual sites
	// Example: WP-Super-Cache
];

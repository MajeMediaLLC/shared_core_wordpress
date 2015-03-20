# Shared Core WordPress
A file and folder structure for a shared core WordPress server environment without enabling multi-site

## Versions Included
Downloaded from `https://wordpress.org/download/` on 3/20/2015 via `latest.tar.gz`

### Core
- WordPress version `4.1.1`

### Plugins ( within `shared_plugins` )
- Akismet version `3.0.4` ( symlinked from `sites/sitea.example.com/plugins` )
- hello.php version `1.6` ( symlinked from `sites/sitea.example.com/plugins` )

### Themes ( within `shared_themes` )
- TwentyFifteen version `1.0` as described in `style.css`
 - symlinked from `sites/sitea.example.com/themes`
- TwentyFourteen version `1.3` as described in `style.css`
 - symlinked from `sites/sitea.example.com/themes`
- TwentyThirteen version `1.4` as described in `style.css`
 - symlinked from `sites/sitea.example.com/themes`

## Setup Instructions
1. Clone this repository to your server (following steps assume you're going to host sites from there)
2. Inside the `sites/` directory move the `sitea.example.com` directory to the site[1] you want to host
3. cd to your site's current `wp-content/themes` directory
4. `cp -R . /path/to/shared_core_wordpress/sites/sitea.example.com/themes`
 - **Note**: if you want to have some themes shared; copy them into the `/path/to/shared_core_wordpress/shared_themes` directory
 - It's OK to overwrite the themes in `shared_themes` with the themes your site is currently using as long as you realize that all shared_core sites could use that same theme version if symlinked.
5. cd to your site's current `wp-content/plugins` directory
6. `cp -R . /path/to/shared_core_wordpress/sites/sitea.example.com/plugins`
 - **Note**: if you want to have some plugins shared; copy them into the `/path/to/shared_core_wordpress/shared_plugins` directory
 - It's OK to overwrite the plugins in `shared_plugins` with the plugins your site is currently using as long as you realize that all shared_core sites could use that same plugin version if symlinked.
7. cd to your site's current `wp-content/uploads` directory
8. `cp -R . /path/to/shared_core_wordpress/sites/sitea.example.com/uploads`
 - **NOTE**: be sure you have enough space on your server for two copies of all your uploads (it's temporary, but this directory gets HUGE)
9. Setup symlinks for new shared_plugins/themes ( see "*How to use a shared theme or plugin*" below )
10. Open your current wp-config.php and the `/path/to/shared_core_wordpress/sites.php` files
 - change all `sitea.example.com` to your `ServerName` value
 - update the `db*` settings as needed
11. go to `https://api.wordpress.org/secret-key/1.1/salt` in your browser
12. Update each of the salts below the `Salts Below` comment in `sites.php` with the results from step #11
13. Open your Virtual Hosts config
 - change the `DocumentRoot` to `/path/to/shared_core_wordpress/shared_core`
 - change all other references to your old `DocumentRoot` to the same (see "*Example VirtualHost setup*" below)
 - `Alias /wp-content /path/to/shared_core_wordpress/sites/sitea.example.com`
14. Reload apache ( `sudo service apache2 reload` )
15. Visit your site

### How to use a shared theme or plugin
1. Have the theme or plugin in it's respective `shared_` directory
2. cd to `/path/to/shared_core_wordpress/sites/sitea.example.com/plugins` (or `/themes`)
3. Symlink: `ln -s ../../../shared_plugins/plugin-name`
4. go into your site's admin plugins listing
5. activate the plugin

### Example VirtualHost setup
    <VirtualHost *:80>
        DocumentRoot /path/to/shared_core_wordpress/shared_core
        ServerName sitea.example.com

        Alias /wp-content /path/to/shared_core_wordpress/sites/sitea.example.com

        <Directory /path/to/shared_core_wordpress/shared_core>
                Options -Indexes +FollowSymLinks +MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>

        <Directory /path/to/shared_core_wordpress/sites/sitea.majemedia.com>
                Options -Indexes +FollowSymLinks +MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
    </VirtualHost>



## Tested Against Versions
- PHP 5.4
- Apache 2.4.7
- Ubuntu 14.04LTS

## TODO
- permissions structure suggestions
- bin scripts for permissions fixes

## Footnotes
[1]: You need to use the `ServerName` variable from the virtual hosts setup.

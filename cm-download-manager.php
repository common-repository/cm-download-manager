<?php
/*
* Plugin Name: CM Download Manager
* Plugin URI: https://www.cminds.com/wordpress-plugins-library/downloadsmanager/
* Description: Allow users to upload, manage, track and support documents or files in a directory listing structure for others to use and comment.
* Version: 2.9.3
* Author: CreativeMindsSolutions
*/

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
load_plugin_textdomain( 'cm-download-manager', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
if (version_compare('5.3', phpversion(), '>')) {
	die('We are sorry, but you need to have at least PHP 5.3 to run this plugin (currently installed version: '.phpversion().') - please upgrade or contact your system administrator.');
}
//Define constants
define('CMDM_PREFIX', 'CMDM_');
define('CMDM_PLUGIN_FILE', __FILE__);
define('CMDM_PATH', WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)));
define('CMDM_URL', plugins_url('', __FILE__));
define('CMDM_RESOURCE_URL', CMDM_URL . '/views/resources/');
define('CMDM_VERSION', '2.9.2');


//Init the plugin
require_once CMDM_PATH . '/lib/CMDM.php';
require_once CMDM_PATH . '/lib/controllers/BaseController.php';
require_once CMDM_PATH . '/lib/controllers/CmdownloadController.php';
require_once CMDM_PATH . '/package/cminds-free.php';
register_activation_hook(__FILE__, array('CMDM', 'install'));
//register_uninstall_hook(__FILE__, array('CMDM', 'uninstall'));
register_deactivation_hook(__FILE__, array('CMDM', 'uninstall'));
CMDM::init();
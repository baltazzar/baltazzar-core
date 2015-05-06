<?php
/*
Plugin Name: BaltazZar Core
Description: WordPress core system for many plugins.
Author: BaltazZar™
Version: 1.0.0
Author URI: http://github.com/baltazzar
*/
define('BTZ_CORE_PATH',  plugin_dir_path( __FILE__ ));
define("BTZ_CORE_PLUGINPATH", "/" . dirname(plugin_basename( __FILE__ )));
define('BTZ_CORE_TEXTDOMAIN', 'codestyling-localization');
define('BTZ_CORE_BASE_URL', plugins_url(BTZ_CORE_PLUGINPATH));

require 'includes/plugin-update-checker/plugin-update-checker.php';
$repoInfo = PucFactory::getLatestClassVersion('PucGitHubChecker');
$myUpdateChecker = new $repoInfo(
    'https://github.com/baltazzar/baltazzar-core/',
    __FILE__,
    'master'
);

require 'includes/functions.php';
?>

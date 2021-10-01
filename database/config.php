<?php

// sites/default/settings.php

/**
 * @file
 * The file Drupal includes. Generally this file doesn't change because
 * we include additional files.
 */

$databases = [];
$config_directories = [];

// Default settings. All in git.
include $app_root . '/sites/default/includes/default.settings.php';

// Totally *optional* local settings overrides that are not in git.
if (file_exists($app_root . '/sites/default/includes/local.settings.php')) {
  include $app_root . '/sites/default/includes/local.settings.php';
}

// Totally *optional* local services overrides that are not in git.
if (file_exists($app_root . '/sites/default/includes/local.services.yml')) {
  $settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/includes/local.services.yml';
}

// Put this last to prevent core trying to add it in some configurations.
$settings['install_profile'] = 'minimal';
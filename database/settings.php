<?php

// sites/default/includes/default.settings.php

/**
 * @file
 * Set stuff that will be the same for the application under any
 * circumstances, or just sensible defaults.
 */

$settings['update_free_access'] = FALSE;
$settings['file_private_path'] = './sites/default/files/private';
$settings['file_scan_ignore_directories'] = ['node_modules', 'bower_components',];
$settings['hash_salt'] = 'G2RezNogY0QIilvW4Ysg0X2BjmXtMUsLPxrQxy1bUmoWYKKIArIYqvbsGw852WKQIE-6g4GlNA';
$settings['container_yamls'][] = $app_root . '/sites/default/includes/default.services.yml';
$config_directories[CONFIG_SYNC_DIRECTORY] = '../config/sync';

// Detect hosting environment and load appropriately.
if (getenv('PLATFORM_RELATIONSHIPS')) {
  // We are on the Platform.sh
  include $app_root . '/sites/default/includes/platformsh.settings.php';
}
else {
  // We are developing locally.
  include $app_root . '/sites/default/includes/lando.settings.php';
}
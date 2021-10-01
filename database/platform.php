<?php

// sites/default/includes/platform.settings.php

/**
 * @file
 * A pretty minimal Platform.sh settings file.
 * You can also set a platform.services.yml here, following same technique used in other files.
 */

if (isset($_ENV['PLATFORM_APP_DIR'])) {
  $relationships = getenv('PLATFORM_RELATIONSHIPS');
  $relationships = json_decode(base64_decode($relationships), true);
  foreach ($relationships['database'] as $endpoint) {
    if (empty($endpoint['query']['is_master'])) {
        continue;
    }
    $databases['default']['default'] = array(
      'driver' => $endpoint['scheme'],
      'database' => $endpoint['path'],
      'username' => $endpoint['username'],
      'password' => $endpoint['password'],
      'host' => $endpoint['host'],
      'port' => $endpoint['port'],
      'prefix' => '',
    );
  }

  // Set appropriate hosts for Platform.sh.
  $settings['trusted_host_patterns'] = [
    '^.+ab1cd3dc345s\.au\.platformsh\.site$',
    '^lilengine\.co',
    '^www\.lilengine\.co',
    '^something-else\.lilengine\.co',
  ];

}
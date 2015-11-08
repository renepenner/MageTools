#!/usr/bin/env php
<?php
define('BASE_DIR',  realpath( dirname(__FILE__) . '/../../../') );
define('MAGENTO_DIR', BASE_DIR . '/htdocs/');


function get_value($indexes, $arrayToAccess){
   if(count($indexes) > 1)
    return get_value(array_slice($indexes, 1), $arrayToAccess[$indexes[0]]);
   else
    return $arrayToAccess[$indexes[0]];
}


$dafault_json = file_get_contents( BASE_DIR . '/conf/magento/default.json' );
$dafault = json_decode($dafault_json, true);

$env_name = 'develop';
$env_json = file_get_contents( BASE_DIR . '/conf/magento/'.$env_name.'.json' );
$env = json_decode($env_json, true);

$config_array = array_replace_recursive($dafault, $env);

$local_xml_template = file_get_contents( BASE_DIR . '/conf/magento/local.xml' );

$final_local_xml = preg_replace_callback(
  '/\{\{(.*?)\}\}/',
  function($match) use ($config_array) {
      $path = explode('/', $match[1]);
      return get_value($path, $config_array);
  },
  $local_xml_template
);

file_put_contents(MAGENTO_DIR . 'app/etc/local.xml', $final_local_xml);

echo $final_local_xml;
echo "\n\n";

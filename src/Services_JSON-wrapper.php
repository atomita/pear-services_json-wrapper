<?php

# In PHP 5.2 or higher we don't need to bring this in
if (!function_exists('json_encode')) {

	function json_encode($arg) {
		static $services_json;
		if (!isset($services_json)) {
			$services_json = new Services_JSON();
		}
		return $services_json->encode($arg);
	}

}

if (!function_exists('json_decode')) {

	function json_decode($arg, $assoc = false) {
		static $services_json;
		static $servises_json_loose;

		$services = $assoc ? 'servises_json_loose' : 'servises_json';
		if (!isset($$services)) {
			$$services = new Services_JSON($assoc ? SERVICES_JSON_LOOSE_TYPE : 0);
		}
		return $$services->decode($arg);
	}

} 

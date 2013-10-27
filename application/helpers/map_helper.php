<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('find_closest_pub'))
{
	function find_closest_pub($to_pub, $pubs = array()) {
		$r = 6371;		

		$last_pub = 0;
		$last_distance = (float)100;
		foreach ($pubs as $pub) {
			$dLat = deg2rad($to_pub->pub_location_latitude - $pub->pub_location_latitude);
			$dLon = deg2rad($to_pub->pub_location_longitude - $pub->pub_location_longitude);
			$lat1 = deg2rad($to_pub->pub_location_latitude);
			$lat2 = deg2rad($pub->pub_location_latitude);
			
			$a = sin($dLat/2)*sin($dLat/2) + sin($dLon/2)*sin($dLon/2)*cos($lat1)*cos($lat2);
			$c = 2*atan2(sqrt($a), sqrt(1-$a));

			$distance = (float)($r*$c);

			if ($distance < $last_distance) {
				$last_pub = $pub;
				$last_distance = floatval($distance);
			}
		}

		return $last_pub;
	}

}

?>

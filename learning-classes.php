<?php

$provider1 = new Abstract_Provider();
$provider2 = new Abstract_Provider();

Estate_Listing::$code;

abstract class Estate_Listing {
	public $square_feet;
	public $address;
	public $price;
	protected $key_code;
	static $code = 'IDX';

	function set_key_code( $value ) {
		$value = intval( $value );
		static::distance_between_2_points();
		$this->keycode = $value;
	}

	public static function distance_between_2_points( $point1, $point2 ) {
		$point1 = service_provider->get_lat_lon( $point1 );
		$point2 = service_provider->get_lat_lon( $point1 );
		return service->distance_between_lat_long( $point1, $point2 );
	}

	abstract function get_idx_number();
}

class Commercial_Estate_Listing extends Estate_Listing {
	public function get_idx_number() {
		// GET FROM COMMERCIAL SERVICE
	}
}

class Residential_Estate_Listing {
	static $code = "RIDX";
	public $bedroom;
	public $bath;
	public $pool = false;

	public function get_idx_number() {
		// GET FROM RESIDENTIAL SERVICE
		self::$code; // 'IDX'
		static::$code; // 'RIDX'
	}

	public function set_key_code( $value ) {
		$value         = toString( $value );
		$this->keycode = $value;
	}
}

$commercial_property              = new Commercial_Estate_Listing();
$commercial_property->square_feet = 5000;
$commercial_property->address     = "Phoenix, AZ";
$commercial_property->$price      = "$5,000";
$commercial_property->set_key_code( '4321' );

$res_property              = new Residential_Estate_Listing();
$res_property->square_feet = 1500;
$res_property->address     = "Paradise Valley, AZ";
$res_property->$price      = "$500,000";
$res_property->set_key_code( 'AB34EB2' );
$res_property::distance_between_2_points( $_POST['coming-from'], $res_property->address );

<?php

Class Date {
	# default timezone
	private $timezone = 'Asia/Dubai';
	# default datetime format
	private $format = 'M d, Y H:i:s a';

	# constructor
	public function __construct() {
		# set the default timezone
		date_default_timezone_set($this->timezone);
	}

	/**
	 *	Set the timezone
	 *	@param $zone
	 *	@return void
	 */
	public function setTimezone( $zone ) {
		date_default_timezone_set($zone);
		return $this;
	}

	# get the current date/time
	public function getDate( $unix = false ) {
		$strtime = strtotime('now');
		if( $unix ) {
			return $strtime;
		}
		return date($this->format, $strtime);
	}

	/**
	 *	get the date
	 */

	public function getMobileDate( $date ) {
		return date("j, M", strtotime($date));
	}

	/**
	 *	set the date format
	 *	@param string $format
	 *	@return object
	 */
	public function setFormat( $format ) {
		$this->format = $format;
		return $this;
	}

	/**
	 *	get the current date format
	 */
	public function getFormat() {
		return $this->format;
	}

	public function timePassed($timestamp, $array = false ){
		$time_ago        = strtotime($timestamp);
		$current_time    = time();
		$time_difference = $current_time - $time_ago;
		$seconds         = $time_difference;

		$minutes = round($seconds / 60); // value 60 is seconds  
		$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
		$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
		$weeks   = round($seconds / 604800); // 7*24*60*60;  
		$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
		$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if( $array ) {
			return [
				'mins' 	=> $minutes,
				'hrs' 	=> $hours,
				'days' 	=> $days,
				'weeks' => $weeks,
				'months' => $months,
				'years' => $years,
			];
		}

		if ($seconds <= 60){
			return "Just Now";
		} else if ($minutes <= 60) {
			if ($minutes == 1){
				return "1min";
			} else {
				return "$minutes mins";
			}
		} else if ($hours <= 24) {
			if ($hours == 1){
				return "1hr";
			} else {
				return "$hours hrs";
			}
		} else if ($days <= 7) {
			if ($days == 1){
				return "yesterday";
			} else {
				return "$days days";
			}
		} else if ($weeks <= 4.3) {
			if ($weeks == 1){
				return "1 week";
			} else {
				return "$weeks weeks";
			}
		} else if ($months <= 12){
			if ($months == 1) {
				return "1 month";
			} else {
				return "$months months";
			}
		} else {
			if ($years == 1){
				return "1 year";
			} else {
				return "$years years";
			}
		}
	}
}
<?php

namespace Tools;

class Date {
	public static function toDateTime($datetimeStr) {
		return new \DateTime($datetimeStr, new \DateTimeZone("UTC"));
	}
	public static function toTimeZone($datetime) {
		return $datetime->setTimezone(new \DateTimeZone(TIMEZONE));
	}
	public static function toUTC($datetime) {
		return $datetime->setTimezone(new \DateTimeZone("UTC"));
	}
	public static function toYmd($datetime) {
		return $datetime->format('Y-m-d');
	}
	public static function toYmdHis($datetime) {
		return $datetime->format('Y-m-d H:i:s');
	}
	public static function toFormat($datetime, $format) {
		return $datetime->format($format);
	}
	public static function strToFormat($str, $format) {
		return \Tools\Date::toFormat(\Tools\Date::toDateTime($str), $format);
	}
	/*public static function toTimeZoneStr($datetime) {

	}*/

}

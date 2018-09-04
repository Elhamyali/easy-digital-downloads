<?php
/**
 * Date Functions
 *
 * @package    EDD
 * @subpackage Functions
 * @copyright  Copyright (c) 2018, Easy Digital Downloads, LLC
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      3.0
 */

/**
 * Retrieves a localized, formatted date based on the WP timezone rather than UTC.
 *
 * @since 3.0
 *
 * @param int    $timestamp Timestamp. Can either be based on UTC or WP settings.
 * @param string $format    Optional. Accepts shorthand 'date', 'time', or 'datetime'
 *                          date formats, as well as any valid date_format() string.
 *                          Default 'date' represents the value of the 'date_format' option.
 * @return string The formatted date, translated if locale specifies it.
 */
function edd_date_i18n( $timestamp, $format = 'date' ) {
	$format = edd_get_date_format( $format );

	// If timestamp is a string, attempt to turn it into a timestamp.
	if ( is_string( $timestamp ) ) {
		$timestamp = strtotime( $timestamp );
	}

	return date_i18n( $format, (int) $timestamp );
}

/**
 * Retrieve timezone ID
 *
 * @since 1.6
 * @return string $timezone The timezone ID
 */
function edd_get_timezone_id() {
	return EDD()->utils->get_time_zone( true );
}

/**
 * Retrieves a date format string based on a given short-hand format.
 *
 * @since 3.0
 *
 * @see \EDD_Utilities::get_date_format_string()
 *
 * @param string $format Shorthand date format string. Accepts 'date', 'time', 'mysql', or
 *                       'datetime'. If none of the accepted values, the original value will
 *                       simply be returned. Default 'date' represents the value of the
 *                       'date_format' option.
 *
 * @return string date_format()-compatible date format string.
 */
function edd_get_date_format( $format = 'date' ) {
	return EDD()->utils->get_date_format_string( $format );
}

/**
 * Get the format used by jQuery UI Datepickers.
 *
 * Use this if you need to use placeholder or format attributes in input fields.
 *
 * This is a bit different than `edd_get_date_format()` because these formats
 * are exposed to users as hints and also used by jQuery UI so the Datepicker
 * knows what format it returns into it's connected input value.
 *
 * Previous to this function existing, all values were hard-coded, causing some
 * inconsistencies across admin-area screens.
 *
 * @see https://github.com/easydigitaldownloads/easy-digital-downloads/commit/e9855762892b6eec578b0a402f7950f22bd19632
 *
 * @since 3.0
 *
 * @param string $context The context we are getting the format for. Accepts 'display' or 'js'.
 *                        Use 'js' for use with jQuery UI Datepicker. Use 'display' for HTML attributes.
 * @return string
 */
function edd_get_date_picker_format( $context = 'display' ) {

	// What is the context that we are getting the picker format for?
	switch ( $context ) {

		// jQuery UI Datepicker does its own thing
		case 'js':
		case 'javascript':
			$retval = EDD()->utils->get_date_format_string( 'date-js' );
			break;

		// Used to display in an attribute, placeholder, etc...
		case 'display':
		default:
			$retval = EDD()->utils->get_date_format_string( 'date-attribute' );
			break;
	}

	/**
	 * Filter the date picker format, allowing for custom overrides
	 *
	 * @since 3.0
	 *
	 * @param string $retval  Date format for date picker
	 * @param string $context The context this format is for
	 */
	return apply_filters( 'edd_get_date_picker_format', $retval, $context );
}

/**
 * Return an array of values used to populate an hour dropdown
 *
 * @since 3.0
 *
 * @return array
 */
function edd_get_hour_values() {
	return (array) apply_filters(
		'edd_get_hour_values',
		array(
			'00' => '00',
			'01' => '01',
			'03' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
		)
	);
}

/**
 * Return an array of values used to populate a minute dropdown
 *
 * @since 3.0
 *
 * @return array
 */
function edd_get_minute_values() {
	return (array) apply_filters(
		'edd_get_minute_values',
		array(
			'00' => '00',
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '32',
			'33' => '33',
			'34' => '34',
			'35' => '35',
			'36' => '36',
			'37' => '37',
			'38' => '38',
			'39' => '39',
			'40' => '40',
			'41' => '41',
			'42' => '42',
			'43' => '43',
			'44' => '44',
			'45' => '45',
			'46' => '46',
			'47' => '47',
			'48' => '48',
			'49' => '49',
			'50' => '50',
			'51' => '51',
			'52' => '52',
			'53' => '53',
			'54' => '54',
			'55' => '55',
			'56' => '56',
			'57' => '57',
			'58' => '58',
			'59' => '59',
		)
	);
}

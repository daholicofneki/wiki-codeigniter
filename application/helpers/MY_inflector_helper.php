<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// --------------------------------------------------------------------

/**
 * Strip Text
 *
 * Takes multiple words separated by spaces and underscores them
 *
 * @access	public
 * @param	string
 * @return	str
 */
if ( ! function_exists('strips_text'))
{
	function strips_text($str)
	{
		return preg_replace('/[\s]+/', '-', strtolower(trim($str)));
	}
}


// --------------------------------------------------------------------

/**
 * Stript to Humanize
 *
 * Takes multiple words separated by underscores and changes them to spaces
 *
 * @access	public
 * @param	string
 * @return	str
 */
if ( ! function_exists('strip_to_humanize'))
{
	function strip_to_humanize($str)
	{
		return ucwords(preg_replace('/[-]+/', ' ', strtolower(trim($str))));
	}
}

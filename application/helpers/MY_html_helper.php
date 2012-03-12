<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Load File JS
 *
 * @access       public
 * @param        string
 * @return       string
 */
function js ($file = '')
{
    if (is_array($file))
    {
	foreach($file as $val)
	{
	    echo '<script src="'.base_url().'_assets/js/'.$val.'" type="text/javascript"></script>';
	    echo "\n";
	}
    }
    else
    {
	echo '<script src="'.base_url().'_assets/js/'.$file.'" type="text/javascript"></script>';
    }
}

/**
 * Load File CSS
 *
 * @access       public
 * @param        string
 * @return       string
 */
function css ($file = '')
{
    if (is_array($file))
    {
	foreach($file as $val)
	{
	    echo '<link href="'.base_url().'_assets/css/'.$val.'" media="screen" rel="stylesheet" type="text/css" />';
	    echo "\n";
	}
    }
    else
    {
       echo '<link href="'.base_url().'_assets/css/'.$file.'" media="screen" rel="stylesheet" type="text/css" />';
    }
    
}

/**
 * Load File Image User
 * 
 * @access       public
 * @param        string
 * @return       string
 */
function image ($file = '')
{
    return base_url().'static/image/upload/'.$file;
}


/**
 * Remove html tag
 * 
 * @access       public
 * @param        string
 * @return       string
 */
function strip_html_tags( $text )
{
    $text = preg_replace(
	array(
	    // Remove invisible content
	    '@<head[^>]*?>.*?</head>@siu',
	    '@<style[^>]*?>.*?</style>@siu',
	    '@<script[^>]*?.*?</script>@siu',
	    '@<object[^>]*?.*?</object>@siu',
	    '@<embed[^>]*?.*?</embed>@siu',
	    '@<applet[^>]*?.*?</applet>@siu',
	    '@<noframes[^>]*?.*?</noframes>@siu',
	    '@<noscript[^>]*?.*?</noscript>@siu',
	    '@<noembed[^>]*?.*?</noembed>@siu',

	    // Add line breaks before & after blocks
	    '@<((br)|(hr))@iu',
	    '@</?((address)|(blockquote)|(center)|(del))@iu',
	    '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
	    '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
	    '@</?((table)|(th)|(td)|(caption))@iu',
	    '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
	    '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
	    '@</?((frameset)|(frame)|(iframe))@iu',
	),
	array(
	    ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
	    "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
	    "\n\$0", "\n\$0",
	),
	$text );

    // Remove all remaining tags and comments and return.
    return strip_tags( $text );
}

/**
 * Thickbox anchor 
 *
 */
function anchor_box($url ='', $title ='', $attributes ='')
{
    return anchor('',$title, $attributes. ' onclick="tb_show(\'\',\''.base_url().$url.'\',\'\'); return false;"');
}
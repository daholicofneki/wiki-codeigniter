<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function posts($var)
{
    $post = array();
    $CI = &get_instance();
    
    foreach($var as $v)
    {
	$post[$v] = $CI->input->post($v);
    }
    return $post;
}

function gets($var)
{
    $get = array();
    $CI = &get_instance();
    
    foreach($var as $v)
    {
	$get[$v] = $CI->input->get($v);
    }
    return $get;
}

// ------------------------------------------------------------------------

/**
 * showErrors
 *
 * Show the error of the form validations
 *
 * @access	public
 * @return	object
 */

if ( ! function_exists('showErrors'))
{
    function showErrors()
    {
	$post = '';
	
	foreach(array_keys($_POST) as $key)
	{
	    $post .= form_error($key," ","\n");
	}
	return $post;
    }
}

// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

if ( ! function_exists('setError'))
{
    function setError($message)
    {	
	$CI = &get_instance();
	$CI->session->set_userdata('errorMessage', $message);
    }
}



// ------------------------------------------------------------------------

/**
 * Set Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */

function setSucces($message)
{	
    $CI = &get_instance();
    $CI->session->set_userdata('succesMessage', $message);
}



// ------------------------------------------------------------------------

/**
 * View Errors
 *
 * Set the error of the form validations
 *
 * @access	public
 * @param   string
 * @return	object
 */


function view_errors($errorMessage=false)
{
    if ($errorMessage)
    {
	echo '<div class="alert alert-success">'.$errorMessage.'</div>';
	return false;
    }
    
    $CI = &get_instance();
    
    $err = $CI->session->userdata('errorMessage');
    if($err) echo '<ul class="alert alert-error unstyled">'.$err.'</ul>';
    $CI->session->unset_userdata('errorMessage');
    
    $succ = $CI->session->userdata('succesMessage');
    if($succ) echo '<ul class="alert alert-success unstyled">'.$succ.'</ul>';
    $CI->session->unset_userdata('succesMessage');
}

// ------------------------------------------------------------------------

/**
 * Get Post Array
 *
 * Get input form auth of the form validations
 *
 * @access	public
 * @param   array 
 * @return	object
 */

if ( ! function_exists('getPosts'))
{
	function getPosts($var){
		$post = array();
		$CI = &get_instance();
		    
		foreach($var as $v)
		{
		      $post[$v] = $CI->db->escape_str($CI->input->get_post($v, TRUE));
		}
		return $post;
	}
}

// -----------------------------------------------------------------------------------------

if ( ! function_exists('form_text'))
{
    function form_text($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		    $extra .= ' id="'.$data.'"';
		    echo form_input($data, $val, $extra);
		    echo form_error($data,'<p class="help-block">','</p>');
	    echo '</div></div>';
		
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls">';
		    $extra .= ' id="'.$data.'"';
		    echo form_input($data, $val, $extra);
	    echo '</div></div>';
	}
    }
}

if ( ! function_exists('form_pass'))
{
    function form_pass($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		    $extra .= ' id="'.$data.'"';
		    echo form_password($data, $val, $extra);
		    echo form_error($data,'<p class="help-block">','</p>');
	    echo '</div></div>';
		
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls">';
		    $extra .= ' id="'.$data.'"';
		    echo form_password($data, $val, $extra);
	    echo '</div></div>';
	}
    }
}

// -----------------------------------------------------------------------------------------

if ( ! function_exists('form_area'))
{
    function form_area($label, $data , $value = FALSE, $extra = FALSE)
    {
	$CI = & get_instance();
	$val = $CI->input->post($data) ? $CI->input->post($data) : $value;
	
	if (form_error($data))
	{
	    echo '<div class="control-group error">';
	    echo '<label class="control-label error" for="'.$data.'">'.$label.'</label>';
	    echo '<div class="controls error">';
		echo '<textarea name="'.$data.'" '.$extra.' id="'.$data.'">'.$val.'</textarea>';
		echo form_error($data,'<span class="help-inline">','</span>');
	    echo '</div></div>';
		
	}
	else
	{
	    echo '<div class="control-group">';
	    echo '<label class="control-label" for="'.$data.'">'.$label.':</label>';
	    echo '<div class="controls">';
		echo '<textarea name="'.$data.'" '.$extra.' id="'.$data.'">'.$val.'</textarea>';
	    echo '</div></div>';
	}
    }
}


function form_drop($label, $data , $values= array(), $value,  $extra = FALSE)
{
    $CI = & get_instance();
    $val = $CI->input->post($data) ? $CI->input->post($data) : $value;
    
    if (form_error($data))
    {
	echo '<div class="control-group error">';
	echo '<label class="control-label error">'.$label.'</label>';
	echo '<div class="controls error">';
	    echo form_dropdown($data, $values, $val, $extra);
	    echo form_error($data,'<span class="help-inline">','</span>');
	echo '</div></div>';
	    
    }
    else
    {
	echo '<div class="control-group">';
	echo '<label class="control-label">'.$label.'</label>';
	echo '<div class="controls">';
	    echo form_dropdown($data, $values, $val, $extra);
	echo '</div></div>';
    }
}


// -----------------------------------------------------------------------------------------

function form_rad($label, $data , $values= array(), $value,  $extra = FALSE)
{
    $CI = & get_instance();
    $val = $CI->input->post($data) ? $CI->input->post($data) : $value;
    
    if (form_error($data))
    {
	echo '<div class="control-group error">';
	echo '<label class="control-label error">'.$label.'</label>';
	echo '<div class="controls error">';
	echo '<div class="control-list">';
	    echo form_radios($data, $values, $val, $extra);
	    echo form_error($data,'<span class="help-inline">','</span>');
	echo '</div></div></div>';
    }
    else
    {
	echo '<div class="control-group">';
	echo '<label class="control-label">'.$label.'</label>';
	echo '<div class="controls">';
	echo '<div class="control-list">';
	    echo form_radios($data, $values, $val, $extra);
	echo '</div></div></div>';
    }
}


function form_radios($key,$values,$value=FALSE)
{		
    if ($values)
    {
	$radios = array();
	foreach ($values as $item=>$label)
	{
	    //print_r($v);
	    $arr = array(
		'name' => $key,
		'id' => $key.'_'.$item,
		'value' => $item,
		'checked' => set_value($key,$value) == $item
	    );
	
	    // memanggil form_radio dari form_helper	 
	    $radios[] = '<label class="radio">'.form_radio($arr).$label.'</label>';
	}
		   
	// return implode
	return implode('',$radios);
    }
    else return '--options empty--';
		
}

// -----------------------------------------------------------------------------------------

function form_file($label, $data , $value,  $extra = FALSE)
{
    $CI = & get_instance();
    $val = $CI->input->post($data) ? $CI->input->post($data) : $value;
    
    if (form_error($data))
    {
	echo '<div class="control-group error">';
	echo '<label class="control-label error">'.$label.'</label>';
	echo '<div class="controls error">';
	echo '<div class="control-list">';
	    echo form_upload($data, $val, $extra);
	    echo form_error($data,'<span class="help-inline">','</span>');
	echo '</div></div></div>';
    }
    else
    {
	echo '<div class="control-group">';
	echo '<label class="control-label">'.$label.':</label>';
	echo '<div class="controls">';
	echo '<div class="control-list">';
	    echo form_upload($data, '', $extra);
	echo '</div></div></div>';
    }
}

function form_button($data = '', $content = '', $extra = '')
{
    return '<button type="'.$data.'" name="'.$data.'" '.$extra.'>'.$content."</button>\n";
}



// ------------------------------------------------
/* End of file MY_form_helper.php */
/* Location: ./application/helper/MY_form_helper.php */
// ------------------------------------------------
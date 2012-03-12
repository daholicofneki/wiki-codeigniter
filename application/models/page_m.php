<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_m extends DataMapper {
    
    var $model = 'page_m';
    var $table = 'page';
    var $has_one = array('project_m');
}
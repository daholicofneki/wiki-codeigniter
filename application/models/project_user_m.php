<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project_user_m extends DataMapper {
    
    var $model = 'project_user_m';
    var $table = 'project_user';
    var $has_many = array('page_m');
}
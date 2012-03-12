<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends DataMapper {
    
    var $model = 'users_m';
    var $table = 'user';
    var $has_many = array('project_user_m','project_m');
}
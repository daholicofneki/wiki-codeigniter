<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
            <ul class="nav">
                <li><?php echo anchor('','<i class="icon-home icon-white"></i>');?></li>
                
                <?php if ($this->auth_m->is_secure()):?>
                    <li><?php echo anchor('project','Wiki Project');?></li>
                    <?php if($this->uri->segment(1) === 'project'):?>
                    
                    <?php elseif ($this->uri->segment(1) === 'page'):?>
                        <li><?php echo anchor('project',@$project->name);?></li>
                    <?php endif;?>
                <?php endif;?>
            </ul>
            
            <ul class="nav pull-right">
                <?php if ($this->auth_m->is_secure()):?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $this->auth_m->data('full_name');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('auth/logout','Logout');?></li>
                    </ul>
                </li>
                <?php else:?>
                    <li><?php echo anchor('auth/index','Login');?></li>
                <?php endif;?>
            </ul>
      </div>
    </div>
</div>
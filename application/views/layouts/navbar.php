<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
            <ul class="nav">
                <li><?php echo anchor('','<i class="icon-home icon-white"></i>');?></li>
                
                <?php if ($this->auth_m->is_secure()):?>
                    <?php if($this->uri->segment(1) === 'project'):?>
                        <li><?php echo anchor('project','Wiki Project');?></li>
                    <?php elseif ($this->uri->segment(1) === 'page'):?>
                        <li><?php echo anchor('project',@$project->name);?></li>
                    <?php endif;?>
                <?php endif;?>
            </ul>
            
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">New  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if($this->uri->segment(1) === 'project'):?>
                            <li><?php echo anchor('project/insert','New Project');?></li>
                        <?php else:?>
                            <li><?php echo anchor('accounts/logout','New Page');?></li>
                        <?php endif;?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','Profile');?></li>
                        <li><?php echo anchor('accounts/logout','Logout');?></li>
                    </ul>
                </li>
            </ul>
      </div>
    </div>
</div>
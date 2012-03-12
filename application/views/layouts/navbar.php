<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
            <ul class="nav">
                <li></li>
                <li><?php echo anchor('berita','<i class="icon-home icon-white"></i> </a>');?></li>
            </ul>
            
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">New  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','New Project');?></li>
                        <li><?php echo anchor('accounts/logout','New Page');?></li>
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
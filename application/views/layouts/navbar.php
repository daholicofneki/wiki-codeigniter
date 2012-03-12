<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <?php if ( ! $this->auth->is_secure()):?>
        <a class="brand" href="./index.html">Siberol</a>
        <?php endif;?>
    
        <div class="nav-collapse">
            
            <?php if ( ! $this->auth->is_secure()):?>
            <ul class="nav">
                <li><?php echo anchor('berita','<i class="icon-home icon-white"></i> Home</a>');?></li>
                <li><?php echo anchor('berita/page/internet','Internet');?></li>
                <li><?php echo anchor('berita/page/olahraga','Olahraga');?></li>
                <li><?php echo anchor('berita/page/politik','Politik');?></li>
                <li><?php echo anchor('berita/page/hiburan','Hiburan');?></li>
            </ul>
            <?php elseif($this->auth->data('tipe') === 'Redaktur'):?>
            <ul class="nav">
                <li><?php echo anchor('accounts','<i class="icon-home icon-white"></i> Home</a>');?></li>
                <li><?php echo anchor('redaktur/index/review','Berita Proses Review');?></li>
                <li><?php echo anchor('redaktur/index/tayang','Berita Tayang');?></li>
                <li><?php echo anchor('users/index','Manage users');?></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $this->auth->data('nama_lengkap');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','Profile');?></li>
                        <li><?php echo anchor('accounts/logout','Logout');?></li>
                    </ul>
                </li>
            </ul>
            <?php elseif($this->auth->data('tipe') === 'Wartawan'):?>
            <ul class="nav">
                <li><?php echo anchor('accounts','<i class="icon-home icon-white"></i> Home</a>');?></li>
                <li><?php echo anchor('wartawan/insert','Tulis Baru');?></li>
                <li><?php echo anchor('wartawan/index/review','Berita Proses Review');?></li>
                <li><?php echo anchor('wartawan/index/tayang','Berita Tayang');?></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $this->auth->data('nama_lengkap');?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo anchor('accounts/profile','Profile');?></li>
                        <li><?php echo anchor('accounts/logout','Logout');?></li>
                    </ul>
                </li>
            </ul>
            <?php else:?>
            <?php endif;?>
            
        </div>
      </div>
    </div>
</div>
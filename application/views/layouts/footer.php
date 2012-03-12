<footer class="footer">
    <p class="pull-right">
        <?php echo anchor('page/about','About');?> &nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo anchor('page/contact','Contact');?> &nbsp;&nbsp;&nbsp;&nbsp;
        <?php if ( ! $this->auth->is_secure()):?>
        <?php echo anchor('accounts/login','Login');?>
        <?php endif;?>
    </p>
   
    <p>Designed and built with all the love using <a href="http://www.codeigniter.com">Codeigniter</a>
        and <a href="http://twitter.github.com/bootstrap/">Twitter Boostrap</a>.</p>
    <p>Created by 41508110084 ( Purwandi ) & .... ( Christian ) &copy; 2012</p>
</footer>
<div class="row">
    <div class="span6 offset3">
        <?php echo form_open(uri_string(),array('class'=>'form-horizontal'));?>
            <fieldset>
                <legend>Sign In </legend>
                <?php echo view_errors();?>
                <?php echo form_text('Username','username');?>
                <?php echo form_pass('Password','password');?>
            </fieldset>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <button type="reset" class="btn">Reset</button>
            </div>
        <?php echo form_close();?>
        <p>
            <?php echo anchor('','&larr; Back to Public Page');?>
        </p>
    </div>
</div>

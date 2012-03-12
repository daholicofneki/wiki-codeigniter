<div class="row">
    <div class="span6">
        <div class="page-header">
            <h3><?php echo ucwords($this->uri->segment(2));?> new project</h3>
        </div>
        <?php echo form_open();?>
            <?php echo view_errors();?>
            <?php form_text('Project name','name',@$p->name,'class="span6"');?>
            <?php form_area('Description','description',@$p->description,'class="span6" rows="4"');?>
             <div class="form-actions">
                <button class="btn btn-success" type="submit">Save changes</button>
                <button class="btn">Cancel</button>
              </div>
        <?php echo form_close();?>
    </div>
    <div class="span6">
        
    </div>
</div>
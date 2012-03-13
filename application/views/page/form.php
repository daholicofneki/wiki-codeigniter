<h1><?php echo $project->name;?></h1>
<p><small id="status"><?php echo $project->description;?></small></p>

<ul class="breadcrumb">
    <li><?php echo anchor('','Wikis');?> <span class="divider">/</span></li>
    <li><?php echo anchor('page/index/'.$project->slug,$project->name);?> <span class="divider">/</span></li>
    <li class="active"><?php echo ucwords($this->uri->segment(2));?></li>
</ul>

<div id="wiki">
    <div id="result"></div>
    <?php echo form_open();?>
        <?php echo form_text('Page name','name','','class="span12"');?>
        <?php echo form_area('Page body','body','','row="30" class="span12"');?>
        <div class="form-actions">
            <?php echo form_button('submit','Save changes','id="form" class="btn btn-success"');?>
            <?php echo form_button('reset','Preview','class="btn"');?>
        </div>
    <?php echo form_close();?>
</div>

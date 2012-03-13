<div class="pull-right">
    <p><small id="status">All changes is saved</small></p>
</div>

<h1 style="margin-bottom: 25px;"><?php echo $project->name;?></h1>
<ul class="breadcrumb">
    <li><?php echo anchor('','Wikis');?> <span class="divider">/</span></li>
    <li><?php echo anchor('page/index/'.$project->slug,$project->name);?> <span class="divider">/</span></li>
    <li class="active"><?php echo ucwords($this->uri->segment(2));?></li>
</ul>

<div id="wiki">
    <div id="result"></div>
    <div id="name" contenteditable="true"></div>
    <div id="body" contenteditable="true"></div>
</div>

<div class="form-actions">
    <?php echo anchor('','Save changes','id="form" class="btn btn-success"');?>
    <?php echo anchor('','Preview','class="btn"');?>
</div>
<script>
    !function( $ ){
        $('#form').click(function(){
            $.ajax ({
                type : 'post',
                data: 'project_id=<?php echo $project->id;?>&name='+$('#name').html()+'&body='+$('#body').html(),
                url  : '<?php echo current_url();?>',
                success	        : function(data){
                    $('#result').replaceWith(data);
                },
                error           : function (){alert("Error calling ajax");hide_load();}
            });
            return false;
        })
    }( window.jQuery );
</script>
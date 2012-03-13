<h1><?php echo $project->name;?></h1>
<p><small id="status"><?php echo $project->description;?></small></p>

<ul class="breadcrumb">
    <li><?php echo anchor('project','Wikis');?> <span class="divider">/</span></li>
    <li><?php echo anchor('page/index/'.$project->slug,$project->name);?> <span class="divider">/</span></li>
    <li class="active">Welcome</li>
</ul>

<ul class="nav nav-tabs">
    <?php foreach ($tabs as $t => $v):?>
        <li><?php echo anchor($t, $v);?></li>
    <?php endforeach;?>
</ul>

<?php if ($page):?>
    <div class="pull-right">
        <div class="btn-toolbar">
            <div class="btn-group">
                <?php echo anchor($module.'/insert/'.$project->slug,'New page','class="btn"');?>
                <?php echo anchor($module.'/update/'.$page->slug,'Edit page','class="btn"');?>
                <?php echo anchor('','Page history','class="btn"');?>
               
            </div>
        </div>
    </div>
    <div id="wiki">
        <h1><?php echo $page->name;?></h1>
        <?php echo parse_markdown_extra($page->body);?>
    </div>
    <hr class="soften">
    <p><small>Last edited by ....</small></p>
    <p><?php echo anchor('','Delete this page','class="btn btn-danger"');?></p>
<?php else:?>
    <p>Not found page</p>
<?php endif;?>


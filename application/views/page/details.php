<div class="pull-right">
    <p><small id="status">All changes is saved</small></p>
</div>
<h1 style="margin-bottom: 25px;"><?php echo $project->name;?></h1>

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
        <?php echo anchor($module.'/insert/'.$project->slug,'New page','class="btn"');?>
    </div>
    <div class="page-header">
        <h1>Page <?php echo $project->name;?></h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($page as $v):?>
            <tr>
                <td>
                    <h3><?php echo anchor($module.'/index/'.$project->slug.'/'.$v->slug,$v->name);?></h3>
                    <?php //echo anchor($module.'/index/'.$v-slug,'<h3>'.$v->name.'</h3>');?>
                    <p><small>Last modified at <?php echo $v->created_at;?></small></p>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<?php else:?>
    <p>Not found page</p>
<?php endif;?>


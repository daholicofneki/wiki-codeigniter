<div id="project">
    <h2>Wikis project</h2>
</div>
<table class="table-striped table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Last updated</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($p as $p):?>
        <tr>
            <td>
                <h4><?php echo $p->name;?></h4>
                <p>
                    <small><?php echo $p->description;?></small>
                </p>
            </td>
            <td><?php echo $p->updated_at;?></td>
            <td>
                <?php echo anchor($module.'/update/'.$p->slug,'<i class="icon-pencil"></i> ');?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div id="project">
    <h2>Wikis project</h2>
</div>
<table class="table-striped table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Last updated</th>
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
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
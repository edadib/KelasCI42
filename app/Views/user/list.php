<button class="btn btn-primary mb-2" type="button" onclick="create()">Create</button>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>
                Nama
            </th>
            <th>
                Email
            </th>
            <th>
                Password
            </th>
            <th>
                Tindakan
            </th>
        </tr>
    </thead>
    <tbody>
    <?php if($rows) : ?>
        <?php foreach($rows as $item) : ?>
            <tr>
                <td>
                    <?php echo $item['name']??"-"; ?>
                </td>
                <td>
                    <?php echo $item['email']??"-"; ?>
                </td>
                <td>
                    <?php echo $item['password']??"-"; ?>
                    <?php //$item->price; ?>
                </td>
                <td>
                    <button class="btn btn-primary btn-sm" type="button" onclick="edit('<?php echo $item['id']; ?>')">edit</button>
                    <button class="btn btn-danger btn-sm" type="button" onclick="delete_prod('<?php echo $item['id']; ?>')">delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif ; ?>
    </tbody>
</table>

<div>
    <?= false;//$pager->links();?>
</div>

<form action="" method="post" id="form_editdelete">
    <input type="hidden" name="id" id="id" value="" />
</form>

<script>

    function create()
    {
        location.href = '<?php echo base_url('/user/create'); ?>';
    }

    function edit(id)
    {
        // alert(id);
        document.getElementById('form_editdelete').action = '/user/edit';
        document.getElementById('id').value = id;
        document.getElementById("form_editdelete").submit();
    }

    function delete_prod(id)
    {
        // alert(id);
        document.getElementById('form_editdelete').action = '/user/delete';
        document.getElementById('id').value = id;
        document.getElementById("form_editdelete").submit();
    }
</script>



<?= $this->extend('layout/master.php'); ?>

<?= $this->section('content'); ?>
<button class="btn btn-primary mb-2" type="button" onclick="create()">Create</button>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>
                Nama
            </th>
            <th>
                Keterangan
            </th>
            <th>
                Harga
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
                    <?php echo $item['desc']??"-"; ?>
                </td>
                <td>
                    <?php echo $item['price']??"-"; ?>
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

<form action="" method="post" id="form_editdelete">
    <input type="hidden" name="id_product" id="id_product" value="" />
</form>

<script>

    function create()
    {
        location.href = '<?php echo base_url('/product/create'); ?>';
    }

    function edit(id)
    {
        // alert(id);
        document.getElementById('form_editdelete').action = '/product/edit';
        document.getElementById('id_product').value = id;
        document.getElementById("form_editdelete").submit();
    }

    function delete_prod(id)
    {
        // alert(id);
        document.getElementById('form_editdelete').action = '/product/delete';
        document.getElementById('id_product').value = id;
        document.getElementById("form_editdelete").submit();
    }
</script>

<?= $this->endSection(); ?>


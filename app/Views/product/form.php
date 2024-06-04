<?= $this->extend('layout/master.php'); ?>

<?= $this->section('content'); ?>

<br>
<br>
<?php //if(isset($validator)) : ?>
    <!-- <div class="alert alert-danger">
        <?php //echo $validator; ?>
    </div> -->
<?php //endif; ?>
<form action="/product/save" method="post">
    Nama : 
    <input class="form-control" type="text" name="name" id="name" value="<?php if($rows){ echo $rows['name']; }?>" />
    <?php if(isset($validator['name'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['name']; ?>
        </div>
    <?php endif; ?>
    <br>

    Harga: 
    <input class="form-control" type="number" name="price" id="price" min="0" max="1000000" value="<?php if($rows){ echo $rows['price']; }?>" />
    <?php if(isset($validator['price'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['price']; ?>
        </div>
    <?php endif; ?>
    <br>
    
    Keterangan: 
    <textarea class="form-control" name="desc" id="desc"><?php if($rows){ echo $rows['desc']; }?></textarea>
    <?php if(isset($validator['desc'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['desc']; ?>
        </div>
    <?php endif; ?>
    <br>
    
    <input class="form-control" type="hidden" name="id" id="id" value="<?php if($rows){ echo $rows['id']; }?>" />
    <button class="btn btn-primary btn-sm" type="submit">Hantar</button>
</form>
<?= $this->endSection(); ?>
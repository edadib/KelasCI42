<div class="row">
    <div class="col-10">
        <h1>Daftar Produk</h1>
    </div>
    <div class="col" align="right">
        <button class="btn btn-primary btn-lg mb-2" type="button" onclick="create()">Create</button>
    </div>
</div>
<br>
<?= form_open('/product/save'); ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <div>
            <label class="form-label">Nama :</label>
            <input class="form-control" type="text" name="name" id="name" value="<?php if($rows){ echo $rows['name']; }?>" />
            <?php if(isset($validator['name'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['name']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div>
            <label class="form-label">Harga</label> 
            <input class="form-control" type="number" name="price" id="price" min="0" max="1000000" value="<?php if($rows){ echo $rows['price']; }?>" />
            <?php if(isset($validator['price'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['price']; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div>
            <label class="form-label">Keterangan</label>
            <textarea class="form-control" name="desc" id="desc"><?php if($rows){ echo $rows['desc']; }?></textarea>
            <?php if(isset($validator['desc'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['desc']; ?>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <div align="right">
            <input class="form-control" type="hidden" name="id" id="id" value="<?php if($rows){ echo $rows['id']; }?>" />
            <button class="btn btn-primary btn-lg" type="submit">Hantar</button>
        </div>

    </div>
    <div class="col"></div>
</div>
<?= form_close();?> 
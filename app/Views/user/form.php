<div class="row">
    <div class="col-10">
        <h1>Daftar Pengguna</h1>
    </div>
    <div class="col" align="right">
        <button class="btn btn-primary btn-lg mb-2" type="button" onclick="create()">Create</button>
    </div>
</div>
<br>
<?= form_open('/user/save'); ?>
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
            <label class="form-label">Email</label> 
            <input class="form-control" type="email" name="email" id="email" value="<?php if($rows){ echo $rows['email']; }?>" />
            <?php if(isset($validator['email'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['email']; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div>
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" id="password" value="<?php if($rows){ echo $rows['password']; }?>" />
            <?php if(isset($validator['password'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['password']; ?>
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
<!-- </form> -->
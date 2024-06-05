<div class="row">
    <div class="col-3">
    </div>
    <div class="col-6" align="center">
        <h1>Log Masuk</h1>
    </div>
    <div class="col">
    </div>
</div>
<br>
<?= form_open('/login/auth'); ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
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
            <label class="form-label">Password :</label>
            <input class="form-control" type="password" name="password" id="password" value="<?php if($rows){ echo $rows['password']; }?>" />
            <?php if(isset($validator['password'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['password']; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <br>
        <div align="center">
            <button class="btn btn-primary" type="submit">Log Masuk</button>
        </div>
        
    </div>
    <div class="col"></div>
</div>
<?= form_close();?> 
<!-- </form> -->
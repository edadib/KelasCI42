<div class="row">
    <div class="col-1"></div>
    <div class="col-10" align="center">
        <h1>Log Masuk</h1>
    </div>
</div>
<br>
<?= form_open('/login/auth'); ?>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <?php if(session()->has('msg')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>
        <div>
            <label class="form-label">Email</label> 
            <!-- <input class="form-control" type="email" name="email" id="email" value="" /> -->
            <?= form_input(
                [
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'form-control',
                    'value' => set_value('email'),
                    'placeholder' => 'example@usm.my',
                ]
            ); ?>
            <?php if(isset($validator['email'])) : ?>
                <div class="alert alert-danger">
                    <?php echo $validator['email']; ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div>
            <label class="form-label">Password :</label>
            <input class="form-control" type="password" name="password" id="password" value="" />
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
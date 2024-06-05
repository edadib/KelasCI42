

<br>
<br>
<form action="/user/save" method="post">
    Nama : 
    <input class="form-control" type="text" name="name" id="name" value="<?php if($rows){ echo $rows['name']; }?>" />
    <?php if(isset($validator['name'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['name']; ?>
        </div>
    <?php endif; ?>
    <br>

    Email: 
    <input class="form-control" type="email" name="email" id="email" value="<?php if($rows){ echo $rows['email']; }?>" />
    <?php if(isset($validator['email'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['email']; ?>
        </div>
    <?php endif; ?>
    <br>
    
    Password: 
    <input class="form-control" type="password" name="password" id="password" value="<?php if($rows){ echo $rows['password']; }?>" />
    <?php if(isset($validator['password'])) : ?>
        <div class="alert alert-danger">
            <?php echo $validator['password']; ?>
        </div>
    <?php endif; ?>
    <br>
    
    <input class="form-control" type="hidden" name="id" id="id" value="<?php if($rows){ echo $rows['id']; }?>" />
    <button class="btn btn-primary btn-sm" type="submit">Hantar</button>
</form>
<h2><?php echo $title; ?></h2>

<?php print_r($user) ?>

<?php     
    echo form_open('admin/user/'.$user['id']);
?>

    <label for="title">Название</label>
    <input type="text" name="name" value="<?=$user['name']?>" /><br />   

    <input type="submit" name="submit" value="<?php  echo'Внести изменения';?>" />

</form>
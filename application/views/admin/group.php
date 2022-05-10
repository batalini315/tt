<h2><?php echo $title; ?></h2>


<?php     
    echo form_open('admin/group/'.$group['id']);
?>

    <label for="title">Название</label>
    <input type="text" name="group" value="<?=$group['group']?>" /><br />   

    <input type="submit" name="submit" value="<?php  echo'Изменить название';?>" />

</form>
<h2><?php echo $title; ?></h2>

<?php
     echo form_open('admin/group');
?>

    <label for="title">Название</label>
    <input type="text" name="group" value="" /><br />   

    <input type="submit" name="submit" value="Создать группу" />

</form>
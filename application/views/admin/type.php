<h2><?php echo $title; ?></h2>

<?php
     if($type==[])echo form_open('admin/type/new');
     else echo form_open('admin/type/'.$type["id"]);
?>
    <label for="title">Название</label>
    <input type="text" name="type" value="
    <?php
    if($type != []) echo $type['type'];
    ?>
    " /><br />  

    <input type="submit" name="submit" 
    value="<?php if($type==[]) 
            echo('Создать'); 
            else echo('Редактировать');?> " />

</form>
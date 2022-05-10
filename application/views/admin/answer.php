<h2><?php echo $title; ?></h2>

<?php
     if($answer['name']=='')echo form_open('admin/answer/new');
     else echo form_open('admin/answer/'.$answer["id"]);
?>

    <label for="title">Название</label>
    <input type="text" name="name" value="" /><br />   

    <input type="submit" name="submit" 
    value="<?php if($answer['name']=='') 
            echo('Создать'); 
            else echo('Редактировать');?> " />

</form>
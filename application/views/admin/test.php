<h2><?php echo $title; ?></h2>
<?php
// if($test != []) echo "yes<br>"; else echo "NO<br>";
// print_r($test);
// echo("<br>tupes");
// print_r($types);
?>
<?php
     if($test==[])echo form_open('admin/test/new');
     else echo form_open('admin/test/'.$test["id"]);
?> 
    <label for="title">Название</label>
    <input type="text" name="title" value="<?php if($test !== []) echo $test['title'];?>" /> <br />  
    <label for="title">Тип</label>
    <select name="type" id="">
        <?php                
        foreach ($types as $type ) {
            $select = '';
            if($test != [] && $type['id'] == $test['type']) $select ="selected";
            echo('<option value="'.$type['id'].'" '.$select.'>'.$type['type'].'</option>');
        }
        ?>
    </select><br /> 
    <label for="title">Время</label>  
    <input type="number" name="time" value="<?php if($test != []) echo $test['time'];?>" /> мин <br />   

    <input type="submit" name="submit" 
    value="<?php if($test == []) 
            echo('Создать'); 
            else echo('Редактировать');?> " />

</form>
<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php
print_r($tests);
print_r($task);
     if($task==[])echo form_open('admin/task/new');
     else echo form_open('admin/task/'.$task["id"]);
?>

    <label for="title">Тест</label>
    <select name="id_test" id="">
        <?php                
        foreach ($tests as $test ) {
            $select = '';
            if($task !=[] && $test['id'] == $task['id_test']) $select ="selected";
            echo('<option value="'.$test['id'].'" '.$select.'>'.$test['title'].'</option>');
        }
        ?>
    </select><br />  
    <label for="title">Текст</label>
    <?php
    $val = '';
     if($task !=[]) $val = $task['text'];
     echo form_textarea( array('id' => 'text', 'name' => 'text', 'style' => 'width: 100%'),set_value('description',$val) ); ?>    
    <br />  
    <label for="max_raiting">Макс. рейтинг</label>
    <input type="number" name="max_rating" value="<?php if($task !=[]) echo($task['max_rating']); ?>" /><br />   

    <input type="submit" name="submit" 
    value="<?php if($task==[]) 
            echo('Создать'); 
            else echo('Редактировать');?> " />

</form>
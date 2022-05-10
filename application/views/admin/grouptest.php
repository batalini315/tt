<h2><?php echo $title; ?></h2>

<?php print_r($tests) ;
    echo('<br>Группа: '.$group.'<br>');
?>

<?php     
    echo form_open('admin/grouptest/'.$group);
?>
<input type="hidden" name="id_group" value="<?=$group?>">
    <label for="title">Выбрать тест</label>
    <select name="id_test" id="">
        <?php
        foreach ($tests as $test ) 
        {            
            echo('<option value="'.$test['id'].'">'.$test['title'].'</option>');
        }
        ?>
    </select><br>
   

    <input type="submit" name="submit" value="<?php  echo'Сохранить';?>" />

</form>
<?=validation_errors();?>
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); 
print_r($user);
?>
<?php
     if($user['email']=='')echo form_open('admin/teacher/new');
     else echo form_open('admin/teacher/'.$user["id"]);
?>

    <label for="title">email</label>
    <input type="email" name="email" value="<?=$user['email']?>" /><br />   
    <label for="title">Имя</label>
    <input type="text" name="name" value="<?=$user['name']?>" /><br />   
    <label for="title">Фамилия</label>
    <input type="text" name="lastName" value="<?=$user['lastName']?>" /><br />   
    <label for="title">Страна</label>
    <input type="text" name="country" value="<?=$user['country']?>" /><br />   
    <label for="title">Город</label>
    <input type="text" name="city" value="<?=$user['city']?>" /><br />   
    <label for="title">Школа</label>
    <input type="text" name="school" value="<?=$user['school']?>" /><br />   
    <label for="title">Класс</label>
    <input type="text" name="class" value="<?=$user['class']?>" /><br />  
    <label for="title">Пароль</label>
    <input type="text" name="password" value="<?=$user['password']?>" /><br /> 
    <label for="title">Блокировка</label>
    <input type="radio" name="bloking" value="" /><br />  

    <input type="submit" name="submit" value="<?php if($user['email']=='') echo('Создать Пользователя'); else echo('Редактировать');?> " />

</form>
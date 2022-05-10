<h2><?php echo $title; ?></h2>
<?php echo validation_errors(); ?>
<?php print_r($user); ?>
<?php

if($user == [])$adress = 'admin/users/new';
 else $adress = 'admin/user/'.$user['id'];
     echo form_open($adress);
?>

    <label for="title">email</label>
    <input type="email" name="email" value="<?php if($user != []) echo $user['email']; ?>" /><br />   
    <label for="title">Имя</label>
    <input type="text" name="name" value="<?php if($user != []) echo $user['name']; ?>" /><br />   
    <label for="title">Фамилия</label>
    <input type="text" name="lastName" value="<?php if($user != []) echo $user['lastName']; ?>" /><br />   
    <label for="title">Страна</label>
    <input type="text" name="country" value="<?php if($user != []) echo $user['country']; ?>" /><br />   
    <label for="title">Город</label>
    <input type="text" name="city" value="<?php if($user != []) echo $user['city']; ?>" /><br />   
    <label for="title">Школа</label>
    <input type="text" name="school" value="<?php if($user != []) echo $user['school']; ?>" /><br />   
    <label for="title">Класс</label>
    <input type="text" name="class" value="<?php if($user != []) echo $user['class']; ?>" /><br />   
    <label for="title">Группа</label>
    <select name="id_group" id="">
        <?php foreach ($groups as $group) { 
            $select = '';
            if($user != [] && $group['id'] == $user['id_group']) $select ="selected";
            ?>
        <option value="<?=$group['id']?>" <?=$select?>> <?=$group['group']?> </option>
        <?php } ?>        
    </select>   <br>
    <label for="title">Пароль</label>
    <input type="text" name="password" value="<?php if($user != []) echo $user['password']; ?>" /><br />   
    <label for="title">Блокировка</label>
    <input type="checkbox"  value="1" name="bloking" <?php if($user != [] && $user['bloking'] ) echo ('checked'); ?> style="margin-left: 20px;">
    <br />   

    <input type="submit" name="submit" value="<?php if($user == []) echo ('Создать Пользователя'); else echo('Изменить');?>" />

</form>
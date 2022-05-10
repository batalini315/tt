<?php
echo('<div><br><h2>'.$title.'</h2>');
echo("<br>");
// print_r($test);
// print_r($role);
if($role['id_role'] == 1){
?>
<a href="/admin/teachers"  class="btn btn-primary">Учителя</a><br>
<?php
}
?>
<table class='table'>
<thead>
      <tr>
        <th>Email</th>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Страна</th>
        <th>Город</th>
        <th>Школа</th>
        <th>Класс</th>
        <th>Группа</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($users as $user) 
{
        echo(" <tr>
                <td>".$user["email"]."</td>
                <td>".$user["name"]."</td>
                <td>".$user["lastName"]."</td>
                <td>".$user["country"]."</td>
                <td>".$user["city"]."</td>
                <td>".$user["school"]."</td>
                <td>".$user["class"]."</td>
                <td>".$user["group"]."</td>
                <td><a href= '/admin/user/".$user["id"]."'>Редактировать</td> 
                <td><a href= '/admin/user/delete/".$user["id"]."'>Удалить</td> 
        </tr>");
};
?>
    </tbody>
</table>
<a href="/admin/users/new"  class="btn btn-primary">Создать нового</a><br>

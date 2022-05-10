
<h2> <?=$title?> </h2>
 <?php
// print_r($types);
// print_r($tests);
?>
<table class='table'>
<thead>
      <tr>
        <th>Название</th>
        <th>Тип</th>
        <th>Время</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php

foreach ($tests as $test) 
{
        // $nameType = ($test != [])? $types[$test["type"]['type']]: '';
        echo(" <tr>
                <td>".$test["title"]."</td>
                <td>".$test['type'] ."</td>
                <td>".$test["time"]."</td>
                <td><a href= '/admin/test/".$test["id"]."'>Редактировать</td> 
                <td><a href= '/admin/test/delete/".$test["id"]."'>Удалить</td> 
        </tr>");
};
?>
    </tbody>
</table>
<a href='/admin/test/new' class="btn btn-primary" >Создать</a>
<br>
<?php 
if($role['id_role'] == 1) echo('<a href="/admin/types" class="btn " >Типы</a>');
?>


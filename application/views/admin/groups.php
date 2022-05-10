<h2><?=$title?></h2>
<table class='table'>
<thead>
      <tr>
        <th>Название</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($groups as $group) 
{
        echo(" <tr>
                <td>".$group["group"]."</td>
                <td><a href= '/admin/group/".$group["id"]."'>Редактировать</td> 
                <td><a href= '/admin/group/delete/".$group["id"]."'>Удалить</td> 
        </tr>");
};
?>
    </tbody>
</table>
<a href='/admin/group' class="btn btn-primary" >Создать</a>

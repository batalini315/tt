<h2><?php echo $title; ?></h2>
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
foreach ($types as $type) 
{
        echo(" <tr>
                <td>".$type["type"]."</td>
                <td><a href= '/admin/type/".$type["id"]."'>Редактировать</td> 
                <td><a href= '/admin/type/delete/".$type["id"]."'>Удалить</td> 
        </tr>");
};
?>
    </tbody>
</table>
<a href='/admin/type/new' class="btn btn-primary" >Создать</a>

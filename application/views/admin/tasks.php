<h2><?php echo $title; ?></h2>
<?php
// print_r($tests); 
?>
<script>
        $(document).ready( function() {
        $('#select').change( function() {
        location.href = $(this).val();
        });
});
</script>

<select id="select">
        <option value="#">Выбрать тест</option>
        <?php
        foreach ($tests as $index)
        {
                echo('<option value="/admin/tasks/'.$index["id"].'">'.$index['title'].'</option>');
        }
        ?>        
</select>
<br><br>
<table class='table'>       
<thead>
      <tr>
        <th>Вопрос</th>
        <th>Тест</th>
        <th>Редактировать</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($tasks as $task) 
{
        echo(" <tr>
                <td>".$task["text"]."</td>
                <td>".$task["title"]."</td>
                <td><a href= '/admin/task/".$task["id"]."'>Редактировать</td> 
                <td><a href= '/admin/task/delete/".$task["id"]."'>Удалить</td> 
        </tr>");
};
?>
    </tbody>
</table>
<a href='/admin/task/new' class="btn btn-primary" >Создать</a>

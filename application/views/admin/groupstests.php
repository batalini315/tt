<h2><?=$title?></h2>
<script>
        $(document).ready( function() {
        $('#select').change( function() {
        location.href = $(this).val();
        });
});
</script>

<select id="select">
        <option value="#">Выбрать группу</option>
        <?php
        foreach ($groups as $index)
        {
                echo('<option value="/admin/grouptests/'.$index["id"].'">'.$index['group'].'</option>');
        }
        ?>        
</select>
<?php
//  print_r($tests);
//  print_r($group);
//     echo('<br>Группа: '.$group['group'].'<br>');
if($tests != []){
     ?>
<table class='table'>
<thead>
      <tr>
        <th>Название</th>
        <th>Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php
foreach ($tests as $test) 
{
        echo(" <tr>
                <td>".$test["title"]."</td> 
                <td><a href= '/admin/grouptests/delete/".$test["id"]."'>Удалить</td> 
                </tr>");
};
?>
    </tbody>
</table>

<?php
}
if($group != []) echo('</br><br><a href="/admin/grouptest/'.$group['id'].'" class="btn btn-primary" >Создать</a>');
?>


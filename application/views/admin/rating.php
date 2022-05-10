<?php  
// print_r($rating); 
?>
<table class="table">
    <thead>
        <th>Группа</th>
        <th>Студент</th>
        <th>Балы</th>
    </thead>
    <tbody>
        <?php
        foreach($rating as $user){
            echo('<tr><td>'.$user['group'].'<td>'.$user['name'].'  '.$user['lastName'].'</td><td>'.$user['rating'].'</td>  </tr> ');
        }
        ?>
        
    </tbody>
</table>
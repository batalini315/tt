<div class="container">
    <h2><?=$title?></h2>
     <?php
    // print_r($user);
    // print_r($tests);
    // echo ('<br><br>');
    // print_r($ratings);
    ?>

<h4><?=$user['lastName']?>  <?=$user['name']?></h4>

<table class="table">
    <thead>
        <th>Место</th>
        <th>Студент</th>
        <th>Группа</th>
        <th>Рейтинг</th>
    </thead>
    <tbody>
        <?php
        $ind =1;
        foreach($ratings as $rating ){
            echo('<tr><td>'.$ind.'</td><td>'.$rating['name'].'  '.$rating['lastName'].'</td><td>'.$rating['group'].'</td><td>'.$rating['rating'].'</td></tr>');
            $ind++;
        }
        ?>
    </tbody>
</table>

</div>
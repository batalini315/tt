<div class="container">
    <h2><?=$title?></h2>
     <?php
    // print_r($user);
    // print_r($tests);
    // echo ('<br><br>');
    // print_r($raiting);
    ?>

<h4><?=$user['lastName']?>  <?=$user['name']?></h4>
<h5>Тесты</h5> 
<table class="table" >
    <thead>
        <th>Название</th>
        <th>Время</th>
        <th>Оценка</th>
    </thead>
    <tbody>
        <?php
        foreach ($tests as $test) 
        {
            echo('<tr><td>'.$test['title'].'</td>');
            echo('<td>'.$test['time'].'</td>');
            if($raiting == [])
            {
                // if($raiting[''])
                echo('<th><a href="/asks/'.$test['id_test'].'">Выполнить</a></th></tr>');
            }
            else
            {
                $srtrait = '<th><a href="/asks/'.$test['id_test'].'">Выполнить</a></th></tr>';

                foreach($raiting as $rait) 
                {
                    if($rait['id_test'] == $test['id_test']) 
                    {
                        $srtrait = '<td>'. $rait['sum'].'</td>';
                    }
                }
                echo $srtrait;
            }
            
        }
        ?>
        
    </tbody>
</table>

</div>
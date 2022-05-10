<div class="container">
    <h2><?=$title.':  '.$test['title']?></h2>
<div class="timer">
    <span class="timer__path" id="minutes"><?=$test['time']?></span>
    <span class="timer__path ">:</span>
    <span class="timer__path" id="seconds">00</span>
</div>
<?php 
print_r($user);
echo('<br>tasks: ');
print_r($tasks);
echo('<br>test: ');
print_r($test);
echo('<br>num test'.$val);
echo('<br><a href='.$user['id'].' >'.$user['name'].'</a><br>');

?>
Время для задания: <?=$test['time']?>
<form action="/answer/<?=$test['id']?>" method="post" id="myForm">
<input type="textbox" id="field"/>
<?php
        foreach ($tasks as $task)
        {
            echo('<br>'.$task['text'] . '<br>');
            
            if($test['type'] == 1) echo('<textarea name="'.$task['id'].'" form ="myForm"  cols="60" rows="10"></textarea>');
            else  echo('<input type="text" name="'.$task['id'].'" id="">');
            echo('   Максимальная оценка ответа: '.$task['max_rating']);
        }
?>
<input type="hidden" name="user" value="<?=$user['id']?>">
<br>
<input type="submit" value="Отправить">
</form>
</div>

<script src="../../../assets/js/myjs.js" type="module"></script>
<h2><?=$title?></h2>

    <?php 
    print_r($answers); 
    echo ('<form action="/admin/answer/updete" method="post">');
    
    foreach($answers as $answer)
    {
        echo('<div  class="blue"><label>Ворос: </label>'.$answer['text'].'</div>');
        echo('Ответ: '.$answer['answer'].'<br>');
        echo('Макс оценка:'.$answer['max_rating'].'<br>');
        echo('Оценка: <input type="number" name="'.$answer['id'].'" value="'.$answer['rating'].'"  max="'.trim($answer['max_rating']).'" min="0"><br>');

        echo('___________<br>');
    }
    ?>
    <input type="hidden" name="answer" value="yes">
    <input type="submit" value="Сохранить" />
</form>
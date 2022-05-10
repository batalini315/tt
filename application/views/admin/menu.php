<nav _ngcontent-c5="" class="ui-g-2">
    <menu _ngcontent-c5=""> 
        <a href="/admin/users" <?php if($view == 'users') echo('class="active"'); ?>>Пользователи</a><br>
        <a href="/admin/groups" <?php if($view == 'groups') echo('class="active"'); ?> >Группы</a> <br>
        <a href="/admin/tests" <?php if($view == 'tests') echo('class="active"'); ?> >Тесты</a> <br>
        <a href="/admin/groupstests" <?php if($view == 'groupstests') echo('class="active"'); ?> >Тесты группы</a> <br>
        <a href="/admin/tasks" <?php if($view == 'tasks') echo('class="active"'); ?> >Вопросы</a> <br>
        <a href="/admin/answers"<?php if($view == 'answers') echo('class="active"'); ?>>Ответы</a><br>
        <a href="/admin/result"<?php if($view == 'result') echo('class="active"'); ?>>Результаты</a>
    </menu> 
</nav>
<div class="ui-g-10 admin-content">
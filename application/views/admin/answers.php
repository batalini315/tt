<h2><?=$title?></h2>
<?php
// print_r($answers);
?>
<label>Группы</label> 
<select onChange="selectGroup()" id="selectGroup">
        <option value=0>Выбрать</option>
        <?php
        foreach($groups as $group){
                echo('<option value="'.$group['id'].'">'.$group['group'].'</option>');
        }
        ?>
</select><br><br>
<div id="selectStudent"></div>
<br>
<div id="selectAnswers"></div>

<script>
        function selectGroup(){
                var myselect = document.getElementById("selectGroup");
                if(myselect.options[myselect.selectedIndex].value == 0){
                        alert('Выберирете группу');
                }
                else
                {
                        // alert('show'+ myselect.options[myselect.selectedIndex].value);
                        $.ajax({
                                url: "/admin/users/group/"+myselect.options[myselect.selectedIndex].value,
                                context: document.body,
                                success: function(data){
                                        
                                        key=0;
                                                outstring  = "";
                                        //      document.getElementById("selectStudent").innerHTML = data[0]['id']+data[0]['name']+data[0]['lastName'];
                                       outstring += '<label>Студенты</label> <select  onChange="selectUser()" id="selectUser"> <option value = "0">Выбрать студента</option>';
                                        data.forEach(element => {
                                                console.log(element);
                                                key=1;
                                                outstring +='<option value="'+element['id']+'">'+element['name']+' '+element['lastName']+'</option>';
                                        });
                                        outstring += "</select>"; 
                                          
                                        if(key == 0) {
                                                outstring ="<label>Нет студентов</label>";
                                                // document.getElementById("selectAnswers").innerHTML = "";                                                
                                        }                               
                                        document.getElementById("selectStudent").innerHTML = outstring;
                                        document.getElementById("selectAnswers").innerHTML = "";
                                }
                        })
                } 
        }
        function selectUser(){
                var myselect = document.getElementById("selectUser");
                if(myselect.options[myselect.selectedIndex].value == 0){
                        alert('Выбирете студента');
                }
                else
                {
                        // alert('show'+ myselect.options[myselect.selectedIndex].value);
                        $.ajax({
                                url: "/admin/answers/user/"+myselect.options[myselect.selectedIndex].value,
                                context: document.body,
                                success: function(data){
                                        console.log(data);
                                        if(data[0])
                                        {
                                               outString = '<table class="table"><thead> <tr><th>Название теста</th> <th></th><th>Сум. рейтинг</th></tr> </thead> <tbody>';
                                                data.forEach(element => {
                                                        
                                                        outString += '<tr><td>'+element['title']+'</td><th><a href="answer/'+element['id_test']+'/'+element['id_user']+'">Проверить</a></th><th>'+element['sum_raiting']+'</th></tr>';

                                                });
                                                outString += "</tbody></table>"; 
                                        }
                                        else 
                                        {
                                                outString = "Нет ответов"; 
                                        }                                
                                document.getElementById("selectAnswers").innerHTML = outString;
                                }

                        })
                } 
        }

        
</script>

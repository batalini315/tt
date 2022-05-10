<html>
        <head>
                <title><?=$title?></title>                
                <link rel="stylesheet" href="../../../assets/styles/bootstrap.min.css">
                <link rel="stylesheet" href="../../../assets/styles/style.css">
                <script src="../../../assets/js/jquery.v3.6.0.js"></script>
                
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="left" style="width: 80%;">
              <a href="/" class="navbar-brend">Главная</a>
              <?php
               if($role['id_role'] == 3){
              ?>
              <a href="/cabinet" class="navbar-brend">Кабинет</a>
              <a href="/rating" class="navbar-brend">Результаты</a>
              <?php
              }
              ?>
              <?php
               if($role['id_role'] == 1 || $role['id_role'] == 2 ){
              ?>
              <a href="/admin/users" class="navbar-brend">Кабинет</a>
              <?php
              }
              ?>
              </div>
                <div class="float-right">
                  <?php
                  if($is_ses) echo('<a href="/outlogin" class="navbar-text navbar-link ">Выйти</a>');
                  else echo('<a href="/login" class="navbar-text navbar-link ">Вoйти</a>');
                  ?>
                  
                </div>
                
                <!--button class="navbar-toggler" type="button" id= "logbut" onclick="countRabbits()">Выйти</button-->
                
        </nav>
        

        
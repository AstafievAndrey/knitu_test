<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/dist/css/bootstrap.css" rel="stylesheet">
    </head>
    <style>
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
    <body>
        <!--<div style="margin:0 auto;width:300px">
            <div style="top:20px;">
                <div style="text-align: center;">вход</div>
                <form action="autorize.php" method="post">
                    <input type="text" name="login" style="width:300px;height: 20px;"><br>
                    <input type="text" name="pass" style="width:300px;height: 20px;"><br>
                    <input type="submit" value="начать" style="margin-top:10px">
                </form>
            </div>
        </div>-->
        <div class="container">
            <form class="form-signin" role="form" action="autorize.php" method="post">
              <center><h4 class="form-signin-heading">Войти для тестирования</h4></center>
              <input type="text" name="login" class="form-control" placeholder="Логин" required autofocus>
              <input type="password" name="pass" class="form-control" placeholder="Пароль" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Начать</button>
            </form>
        </div>
    </body>
</html>

<?php
require 'class.php';
$sh=Db::getInstance();
$users=$sh->showList();
$rating=$sh->ratingDiag();
$k=0;
$ratsum=0;
$disp=0;
foreach ($rating as $value) {
    $ratsum=$ratsum+$value['rating']*$value['count'];
    $k=$k+$value['count'];
}
foreach ($users as $value) {
    $disp=$disp+pow(($value['rating']-$ratsum/$k),2);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Тест</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<link href="css/style.css" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link href="css/dist/css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/chart.min.js"></script>
<!--[if IE]>
<script src="js/excanvas.js"></script>
<![endif]-->
<script src="js/canvasDiagramm.js"></script>
</head>
<body>   
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div id="container">
    <ul class="nav nav-pills" style="margin-top:4px;">
         <li role="presentation" class="active" ><a style="background:grey;padding:7px 450px;" href="signin.php">Тест</a></li>
    </ul> 
    </div>
</nav>
<div id="container">
<div class="col-md-6" style="width:300px;margin-top:20px;">
            <table class="table table-striped" style="">
                <thead>
            <tr>
                <th>Фамилия</th>
                <th>Результат</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    foreach ($users as $user) {
                       echo "<tr><td>$user[1]</td><td>$user[3]</td></tr>";
                    }
                    echo "<tr style='background:green;'><td>Среднее</td><td colspan='2'>".$ratsum/$k."</td></tr>";
                    echo "<tr style='background:green;'><td>Дисперсия</td><td colspan='2'>".$disp/($k-1)."</td></tr>";
                ?>
        </tbody>
    </table>
</div>
<canvas id="income" width="600" height="400" style="margin-top:50px;"></canvas>
        <script>
            var income = document.getElementById("income").getContext("2d");
            var barData = {
                labels : [<?php foreach ($rating as $value) {
                                    echo $value['rating'].",";
                                }?>],
                datasets : [
                    {
                        fillColor : "#48A497",
                        strokeColor : "#48A4D1",
                        data : [<?php foreach ($rating as $value) {
                                    echo $value['count'].",";
                                }?>]
                    }
                ]
            }
           new Chart(income).Bar(barData);
        </script>
<canvas id="chart" width="600" height="500"></canvas>
<table id="chartData" style="display:none;">
    <tr>
      <th>Оценка</th><th>Количество</th>
    </tr>
    <?php
    foreach($rating as $value){
        switch ($value[0]){
            case 2: echo    '<tr style="color: red">
                                <td>'.$value[0].'</td><td>'.$value[1].'</td>
                            </tr>'; break;
            case 3: echo    '<tr style="color: orange">
                                <td>'.$value[0].'</td><td>'.$value[1].'</td>
                            </tr>'; break;
            case 4: echo    '<tr style="color: green">
                                <td>'.$value[0].'</td><td>'.$value[1].'</td>
                            </tr>'; break;            
            case 5: echo    '<tr style="color: blue">
                                <td>'.$value[0].'</td><td>'.$value[1].'</td>
                            </tr>'; break;
        } 
    }
    ?> 
</table>
</div>
</body>
</html>


<?php
require 'class.php';
$sh=Db::getInstance();
$users=$sh->showList();
$rating=$sh->ratingDiag();
print_r($rating);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test</title>
        <link href="dist/css/bootstrap.css" rel="stylesheet">
    </head>
    <body style="background-color: #eee;">
        
        <div class="col-md-6" style="width:300px;">
            <table class="table table-striped" style="border:2px solid #428bca;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Rezult</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($users as $user) {
                            echo "<tr><td>$user[0]</td><td>$user[1]</td><td>$user[3]</td></tr>";
                        }            
                    ?>
                </tbody>
            </table>
        </div>
        <div>
            <img src="graphics/circle.php?param=hi">
        </div> 
        
    </body>
</html>


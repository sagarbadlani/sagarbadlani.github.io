<?php
$url="https://api.rootnet.in/covid19-in/stats/latest";
$json=json_decode(file_get_contents($url),true);
$ans=$json["data"];
// print_r($a);
$a1=$ans['summary'];
// print_r($a);
$in_total=$a1['total'];
$in_rec=$a1['discharged'];
$in_deaths=$a1['deaths'];
$row=$ans['regional'];
// print_r($row[0]['loc']);
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Covid-19 Tracker</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body{width:80%;margin:auto;margin-top:10%;text-align:center;}
    </style>
  </head>
  <body>
    <div class="col-xs-8">
      <table class="table table-striped table-bordered">
      <tr><th colspan="2">COVID - 19 Tracker India</th></tr>
      <tr>
      <th>Total Cases</th>
      <td><?php echo $in_total?></td>
      </tr>
      <tr>
      <th>Deaths</th>
      <td><?php echo $in_deaths?></td>
      </tr>
      <tr>
      <th>Recovered</th>
      <td><?php echo $in_rec?></td>
      </tr>
      </table>
    </div> 
    <div class="col-xs-8">
      <table class="table table-striped table-bordered">
      <tr><th colspan="4">COVID - 19 Tracker Statewise Data</th></tr>
      <tr>
      <th>State</th>
      <th>Total Cases</th>
      <th>Deaths</th>
      <th>Recovered</th>
      </tr>
      <?php
            $i=0;
            while($i<31)
            {
                echo "<tr>";
                echo "<td>".$row[$i]['loc']."</td>";
                echo "<td>".$row[$i]['totalConfirmed']."</td>";
                echo "<td>".$row[$i]['deaths']."</td>";
                echo "<td>".$row[$i]['discharged']."</td>";
                echo "</tr>";
                $i++;
            }
        ?>
      </table>
    </div> 
  </body>
</html>

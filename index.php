<?php
include ("config.php);
$query = $connect->query("SELECT * FROM fruits");
?>

<table border = "1">
  <tr>
    <td>No</td>
    <td>Fruit name</td>
   </tr>
   <?php
   $no = 1;
   while($row = $query->fetch_assoc()){
    echo "<tr>
         <td>$no</td>
         <td>{$row['name']}</td>
         </tr>";
         $no++
        }
?>
</table>>

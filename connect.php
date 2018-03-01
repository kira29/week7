<?php

$username = "pap72";
$password = "jDEw5gSAE";
$hostname = "mysql:host=sql2.njit.edu;dbname=pap72";

try {
$db = new PDO($hostname, $username,$password);
echo "Connected to MySQL<br>";
} catch (PDOException $e) {
  $error_message = $e->getMessage() ;
  echo "<p>An error occurred while connecting to the database : $error_message . <br> </p>";
  }
  
  
$s = 'SELECT *
      FROM accounts
      where id < :id' ;
$query = $db->prepare($s);
$query->bindValue(':id',6);
$query->execute();
$final = $query->fetchAll();
$count = count($final);
echo "Result : $count";
?>
<table border="1">
<th>ID</th>
  <th>Email</th>
<?php foreach ($final as $row) : ?>
<tr>
  
  <td><?php echo $row['id'];  ?></td>
  <td><?php echo $row['email'];  ?></td>
  </tr>
<?php endforeach; ?>
</table>

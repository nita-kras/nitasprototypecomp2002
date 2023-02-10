<html>
<head>
        <title>add movie</title>
        <LINK REL='stylesheet' TYPE='text/css' HREF='dbicw.css'>
</head>
<body>
<h1>Add Movie</h1>

<?php
$gettitle = $_GET['title'];
$actid = $_GET['actID'];
$pr = $_GET['price'];
$yr = $_GET['year'];
$gnr = $_GET['genre'];
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psynk8_COMP1004'; // change me
$db_pass = 'LJHQPY'; // change me
$db_name = 'psynk8_COMP1004'; // change me

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 
$sql="SELECT movieID, actorID, title, price, year, genre FROM Movie WHERE actorID ='$actid'";
$add = "INSERT INTO Movie (actorID, title, price, year, genre) VALUES ('$actid', '$gettitle', '$pr', '$yr', '$gnr')";
?>


<?php
if(mysqli_query($conn, $add))
{
    echo "<h3>Movie Added</h3>";
}
else
{
    echo "<h3>Actor not added.</h3>";
    echo mysqli_error($conn);
    die();
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($movieID, $actorID, $title, $price, $year, $genre);
?>


<table width="750" border="1" cellpadding="1" cellspacing="1">
<tr><th>movieID</th> <th>actorID</th> <th>title</th> <th>price</th> <th>year</th> <th>genre</th> </tr>

<?php
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($movieID) ."</td>";
  echo "<td>". htmlentities($actorID) ."</td>";
  echo "<td>". htmlentities($title) ."</td>";
  echo "<td>". htmlentities($price) ."</td>";
  echo "<td>". htmlentities($year) ."</td>";
  echo "<td>". htmlentities($genre) ."</td>";
  echo "</tr>";
}
?>
</table>

</body>
</html>
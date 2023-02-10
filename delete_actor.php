<html>
<head>
        <title>delete actor</title>
        <LINK REL='stylesheet' TYPE='text/css' HREF='dbicw.css'>
</head>
<body>
<h1>Delete Actor</h1>

<?php
$titlesearch = $_GET['title'];
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psynk8_COMP1004'; // change me
$db_pass = 'LJHQPY'; // change me
$db_name = 'psynk8_COMP1004'; // change me

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno)  die("failed to connect to database\n</body>\n</html>"); 

$sql="SELECT actorID, actorName FROM Actor WHERE actorName ='$titlesearch'";
$deleta = "DELETE FROM Actor WHERE actorName ='$titlesearch'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($actorID, $actorName);

?>

<table width="750" border="1" cellpadding="1" cellspacing="1">
<tr> <th>actorID</th> <th>actorName</th> </tr>

<?php
while($stmt->fetch()){
  echo "<tr>";
  echo "<td>". htmlentities($actorID) ."</td>";
  echo "<td>". htmlentities($actorName) ."</td>";

  echo "</tr>";
}
?>
</table>

<?php
if(mysqli_query($conn, $deleta))
{
    echo "<h3>Record deleted</h3>";
}
else
{
    echo "<h3>Record not deleted, you may have to delete the actor's movie before you delete actor.</h3>";
    echo mysqli_error($conn);
    die();
}
?>

</body>
</html>

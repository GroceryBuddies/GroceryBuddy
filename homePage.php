<!DOCTYPE html>
<html lang="en">

<head>
    <title>Current Inventory</title>
    <style>
        td {
            border: 1px solid black;
            padding: 1em 1em 1em 1em;
        }
 </style>
</head>
<body>
<h1>
    Current Inventory by Category
</h1>

Our current book inventory includes the following books in the <?php echo $_GET["category"]; ?> category.<br>

<?php
include 'login.php';
$libraryDB = new mysqli($hn, $un, $pw, $db);
$category = $_GET["category"];
$query = "SELECT * FROM classics WHERE category='$category'";
$result = $libraryDB->query($query);
echo "<table>";
echo "<tr>
<th><b>Title</b></th>
<th><b>Author</b></th>
<th><b>Category</b></th>
<th><b>Year</b></th>
<th><b>ISBN</b></th>
</tr>";
while($row = $result->fetch_array())
{
    echo "<tr>\n";
    echo "<td>".$row[title]."</td>\n";
    echo "<td>".$row[author]."</td>\n";
    echo "<td>".$row[category]."</td>\n";
    echo "<td>".$row[year]."</td>\n";
    echo "<td>".$row[isbn]."</td>\n";
    echo '</tr>';
}
echo '</table>';
?>

</body>
</html>
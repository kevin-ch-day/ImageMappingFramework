<?php
require_once('includes\header.inc');


$url = $_POST["url"];
$name = $_POST["name"];
$target = $_POST["target"];
$coords = $_POST["coords"];

echo "<b>Link: $url<b><br/>";
echo "<b>Title: $name<b><br/>";
echo "<b>Target: $target<b><br/>";
echo "<b>Coords: $coords<b><br/>";


mysqli_select_db($conn, "imageframework");

$query = "INSERT INTO imagelinks (link_url, link_name, link_target, link_coords)
VALUES ('$url', '$name', '$target', '$coords')";

aQuery($query);

require_once('includes\footer.inc');
?>
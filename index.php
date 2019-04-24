<?php
require_once('includes\header.inc');

echo "<div id=\"content\"><div id=\"main-menu\">";

if(isset($image)){
    echo "<img src=\"images\\$image\" alt=\"Image\">";

}else{
    echo "<h1>No image uploaded yet</h1>";
    echo "<a href=\"uploadImage.php\">Upload an Image</a><br/>";
}

echo "</div></div>";
require_once('includes\footer.inc');
?>
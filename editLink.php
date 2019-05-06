<?php
require_once('includes\header.inc');

echo "<div id=\"content\"><div id=\"main-menu\">";
echo "<h1>Edit Link</h1>";

mysqli_select_db($conn, "imageframework");
$query = "SELECT * FROM imagelinks where id=".$_GET['id'];
$result = aQuery($query);

if($result->num_rows > 0 ){
        while($row = $result->fetch_array()){
?>
            <form action="generateImageMap.php" method="POST" id="imageLinkForm"><br/>
            Link: <input type="text" name="url" value="<?php echo $row['link_url']?>"><br/>
            Title: <input type="text" name="name" value="<?php echo $row['link_name']?>"><br/>
            Target: <select name="target">
		    <option value="---">---</option>
		    <option value="_blank">_blank</option>
		    <option value="_parent">_parent</option>
		    <option value="_parent">_parent</option>
		    <option value="_top">_top</option>
	    </select>

		<input type="hidden" id="imageName" name="imageName" value="<?php echo $_SESSION['image']; ?>"><br/>
		Coordinates: <input type="text" id="coords" name="coords" value="<?php echo $row['link_coords']; ?>"><br/>
		<input type="submit" value="Submit"></form>
<?php
        }
        // Free result set
        $result->free();

} else{
    echo "<p><em>No records were found.</em></p>";
}
echo "</div></div>";
require_once('includes\footer.inc');
?>

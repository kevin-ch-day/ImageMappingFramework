<?php
require_once('includes\header.inc');
$image = $_SESSION['image'];
?>
<style>
</style>
<div id="content">
  <div id="main-menu">
    <h2 align="center">Image Map</h2>
	
	
	<?php 
		$imageName = explode(".", $_SESSION['image']);
	?>

	<!-- display image here -->
	<img src="uploads\<?php echo $_SESSION['image']; ?>" id="uploadedImage" alt="uploaded image" border="1" usemap="#<?php echo $imageName[0]; ?>" />

	
<form action="generateImageMap.php" method="POST" id="imageLinkForm">
<br/>
Link: <input type="text" name="link">
Title: <input type="text" name="title">
Target: <select name="">
		<option value="---">---</option>
		<option value="_blank">_blank</option>
		<option value="_parent">_parent</option>
		<option value="_parent">_parent</option>
		<option value="_top">_top</option>
	</select>
<input type="submit" value="Submit">
</form>


<script>

function showCoords(event) {
  var x = event.clientX;
  var y = event.clientY;
  return new Array(x,y);
}

</script>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>

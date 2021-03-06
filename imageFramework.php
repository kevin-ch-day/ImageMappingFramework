<?php
require_once('includes\header.inc');
$image = $_SESSION['image'];
?>

<style>
</style>
<div id="content">
  <div id="main-menu">
    <h2 align="center">Image Map</h2>

	<?php $imageName = explode(".", $_SESSION['image']); ?>

	<!-- display image here -->
	<img src="images\<?php echo $_SESSION['image']; ?>" id="uploadedImage" alt="uploaded image" border="1" usemap="#<?php echo $imageName[0]; ?>" />

	
<form action="generateImageMap.php" method="POST" id="imageLinkForm">
	<input type="hidden" id="imageName" name="imageName" value="<?php echo $_SESSION['image']; ?>">
	<input type="hidden" id="coords" name="coords" value="">
</form>

<table id="imageLinkTable">
<tr><th>Active</th><th>Link</th><th>Title</th><th>Target</th></tr>
<tr id="">
	<td align="center"><input type="radio" name="active" value="active" form="imageLinkForm" checked></td>
	<td><input type="text" name="link"></td><td><input type="text" name="title" form="imageLinkForm"></td>
	<td><select name="" form="imageLinkForm">
		<option value="---">---</option>
		<option value="_blank">_blank</option>
		<option value="_parent">_parent</option>
		<option value="_parent">_parent</option>
		<option value="_top">_top</option>
		</select>
	</td>
</tr>
<tr><td><button onclick="addNewArea()">Add New Area</button></td><td></td><td></td><td><input type="submit" value="Submit" form="imageLinkForm"></td></tr>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
var coords = "";

function Point(x, y){
	this.x = x;
	this.y = y;
}

function countClicks(x, y){
	if(typeof countClicks.num == 'undefined' ) {
			countClicks.num = 0;
    }

	countClicks.num++;
	if(countClicks.num == 1){
		coords += x + ", " + y;
	}else if(countClicks.num == 2){
		coords += ", " + x + ", " + y;
		console.log(coords);
		countClicks.num = 0;
		document.getElementById("coords").value = coords;
		coords = "";
	}
}

$(document).ready(function() {
	$("img").on("click", function(event) {
  	var x = event.pageX - this.offsetLeft;
		var y = event.pageY - this.offsetTop;
		console.log("Click");
		countClicks(x, y);
    });
});
</script>

  </div>
</div>

<script src="scripts\lib.js"></script>
<?php
require_once('includes\footer.inc');
?>

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
<script>

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

		countClicks(x, y);
    });
});

</script>

	
<form action="generateImageMap.php" method="POST" id="imageLinkForm">
<br/>
Link: <input type="text" name="url">
Title: <input type="text" name="name">
Target: <select name="target">
		<option value="---">---</option>
		<option value="_blank">_blank</option>
		<option value="_parent">_parent</option>
		<option value="_parent">_parent</option>
		<option value="_top">_top</option>
	</select>

<input type="hidden" id="coords" name="coords" value="">
<input type="submit" value="Submit">
</form>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>

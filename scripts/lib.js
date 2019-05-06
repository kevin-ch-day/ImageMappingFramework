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

function addNewArea(){
	var table = document.getElementById("imageLinkTable");
	var newRow = table.insertRow(1);
	newRow.setAttribute("id", "myIdNameforThisRow");
	var activeCell = newRow.insertCell(0);
	var linkCell = newRow.insertCell(1);
	var titleCell = newRow.insertCell(2);
	var targetCell = newRow.insertCell(3);

	//activeCell.stlye.cssText="align='center'";
	activeCell.innerHTML="<input type='radio' name='active' value='active' form='imageLinkForm'>";
	linkCell.innerHTML="<input type='text' name='link' form='imageLinkForm'>";
	titleCell.innerHTML="<input type='text' name='title' form='imageLinkForm'>";
	targetCell.innerHTML=`<select name="" form="imageLinkForm">
			<option value='---'>---</option>
			<option value='_blank'>_blank</option>
			<option value='_parent'>_parent</option>
			<option value='_parent'>_parent</option>
			<option value='_top'>_top</option>
		</select>`;
}
<html>

<head>



<script type="text/javascript">

function Point(x, y) {
  this.x = x;
  this.y = y;
}

var coordinates = new Array();

function FindPosition(oElement){
	if(typeof( oElement.offsetParent ) != "undefined"){
		for(var posX = 0, posY = 0; oElement; oElement = oElement.offsetParent){
			posX += oElement.offsetLeft;
			posY += oElement.offsetTop;
    }
		return [ posX, posY ];
    }else{
		return [ oElement.x, oElement.y ];
    }
}

function getShape(){

    coordinates[0].x
    coordinates[0].y

    coordinates[1].x
    coordinates[1].y
    
}

function GetCoordinates(e){
	var PosX = 0;
	var PosY = 0;
	var ImgPos;

	ImgPos = FindPosition(myImg);
  
	if (!e) var e = window.event;
	
	if (e.pageX || e.pageY){
		PosX = e.pageX;
		PosY = e.pageY;

	}else if (e.clientX || e.clientY){
		PosX = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		PosY = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

	PosX = PosX - ImgPos[0];
	PosY = PosY - ImgPos[1];

    coordinates.push(new Point(PosX, PosY)); 
    console.log();
    display();
    document.getElementById("displayHere").innerHTML = "click";
}

</script>
</head>

<body>
<img id="myImgId" alt="" src="uploads/scaledagileframework.png"/>

<script type="text/javascript">

var myImg = document.getElementById("myImgId");
myImg.onmousedown = GetCoordinates;

</script>

<div id="displayHere">
</div>
</body>

</html>
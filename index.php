<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Captcha</title>
	<script type="text/javascript" src="http://libs.useso.com/js/jquery/2.1.1/jquery.js"></script>
	<script type="text/javascript" src="jquery.color.js"></script>
	<style>
*{
	padding: 0;
	margin: 0;
}
body{
	margin-left: 20px;
}
#tip{
	padding: 5px;
	display: inline-block;
}

#test{
	background-color: white;
}

#con,#capt,#tip{
	margin: 10px 0 ;
}

#capt{
	display: block;
	position: relative;
	height: 21px;
}
.loading,#cappic{
	display: block;
	position: absolute;
	left: 0;
	top: 0;
	height: 21px;
}
.loading{
	top: 8px
}
/*
{
	display: block;
	position: absolute;
	left: 0;
	top: 0;
	height: 21px;
}



#capt{
	position: relative;
	padding: 0;
	margin: 0;

}*/


/*
*Loading Ball
*/



.movingBallLineG{
	position:absolute;
	left:0px;
	top:2px;
	height:1px;
	width:300px;
	background-color:rgb(241,78,78);
}

.movingBallG{
	background-color:rgb(241,78,78);
	position:absolute;
	top:0;
	left:0;
	width:5px;
	height:5px;
	border-radius:3px;
		-o-border-radius:3px;
		-ms-border-radius:3px;
		-webkit-border-radius:3px;
		-moz-border-radius:3px;
	animation-name:bounce_movingBallG;
		-o-animation-name:bounce_movingBallG;
		-ms-animation-name:bounce_movingBallG;
		-webkit-animation-name:bounce_movingBallG;
		-moz-animation-name:bounce_movingBallG;
	animation-duration:1.5s;
		-o-animation-duration:1.5s;
		-ms-animation-duration:1.5s;
		-webkit-animation-duration:1.5s;
		-moz-animation-duration:1.5s;
	animation-iteration-count:infinite;
		-o-animation-iteration-count:infinite;
		-ms-animation-iteration-count:infinite;
		-webkit-animation-iteration-count:infinite;
		-moz-animation-iteration-count:infinite;
	animation-direction:normal;
		-o-animation-direction:normal;
		-ms-animation-direction:normal;
		-webkit-animation-direction:normal;
		-moz-animation-direction:normal;
}



@keyframes bounce_movingBallG{
	0%{
		left:100px;
	}

	50%{
		left:200px;
	}

	100%{
		left:100px;
	}
}

@-o-keyframes bounce_movingBallG{
	0%{
		left:100px;
	}

	50%{
		left:200px;
	}

	100%{
		left:100px;
	}
}

@-ms-keyframes bounce_movingBallG{
	0%{
		left:100px;
	}

	50%{
		left:200px;
	}

	100%{
		left:100px;
	}
}

@-webkit-keyframes bounce_movingBallG{
	0%{
		left:100px;
	}

	50%{
		left:200px;
	}

	100%{
		left:100px;
	}
}

@-moz-keyframes bounce_movingBallG{
	0%{
		left:100px;
	}

	50%{
		left:200px;
	}

	100%{
		left:100px;
	}
}
	</style>
	<script>
function lod(){
	$("#cappic").hide();
	$("#con").val("");
	inte=setTimeout(function(){
		$("#test").load('test.txt?'+Math.random());
		$("#cappic").attr('src','pic.php');
		$("#cappic").fadeIn();
	},1000)
	
}
function tip (con,color) {
	$('#tip').html(con);
	$('#tip').animate({backgroundColor:'#0086b3'},100)
	$('#tip').animate({backgroundColor:color})
}
function check (event) {
	x=event.clientX;
	offx=$("#capt").offset().left;
	$.post(
'Captcha.php',{
	pos:x-offx,
	con:$("#con").val()
},function(data,status){
	switch (data){
		case '1':
			tip("验证成功！",'#4CAF50');
			break;
		case '2':
			tip("验证失败！",'#F14E4E');
			break;
		case '3':
			tip("没有内容！",'#3F51B5');
			break;
		case 'old':
			tip("验证过期！",'#FF9800');
			break;
		case 'fast':
			tip('操作过快','#FF3939');
			break;
	}
}
		)
		lod();
}

	</script>
</head>
<body>
<div>
	<form>
	<input type="text" id="con">
	<span id="capt">
		<div class='loading' id="movingBallG">
			<div class="movingBallLineG"></div>
			<div id="movingBallG_1" class="movingBallG"></div>
		</div>
		<img id='cappic' onclick="check(event)" alt="">
	</span>
	</form>
	<p id="tip"></p><br>
	<div id="test"></div>
</div>

	<script>
lod();
	</script>
</body>
</html>
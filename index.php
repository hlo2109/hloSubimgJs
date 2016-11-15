<?php 
	$carpeta = "imagen";
	 if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..'){
                    unlink($carpeta."/".$archivo);
                }
            }
            closedir($dir);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>hloSubimgJs</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="hloSubimgJs.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>


	<script type="text/javascript">
		$(function(){
			$(".botonimage").hloSubimgJs({
				"name":"file",
				"fileUplaod":"image-ajax-multiple.php",
				"multifile":true,
				success:function(data){
					alert(data);
					// console.log(data);
					var da = JSON.parse(data);
					$.each(da,function(i,k){
						if (k.file!=""){
							$(".visualizaimagen .row").append("<div class='col s12 m12 l3'><img src='"+k.file+"'></div>")
						}
					})
				}				
			});
		})
	</script>
</head>
<body>
	<h1>hloSubimgJs</h1>
	<div class="boton">
		<button class="botonimage btn">Subir imagen</button>
	</div>
	<div class="visualizaimagen">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</div>
	<p data-height="265" data-theme-id="0" data-slug-hash="dOXmBJ" data-default-tab="html" data-user="LantareCode" data-embed-version="2" data-pen-title="Super Mario (Animation)" class="codepen">See the Pen <a href="http://codepen.io/LantareCode/pen/dOXmBJ/">Super Mario (Animation)</a> by LantareCode (<a href="http://codepen.io/LantareCode">@LantareCode</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="https://production-assets.codepen.io/assets/embed/ei.js"></script>
</body>
</html>
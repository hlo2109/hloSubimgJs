# hloSubimgJs
Con la reciente actualización se puede enviar datos adicionales y no solo la imagen, recuerden que todo se recibe por POST.
## Javascript multiple

	<script type="text/javascript">
		$(function(){
			$(".botonimage").hloSubimgJs({
				"name":"file",
				"data":{"variable":"dato"},
				"fileUplaod":"image-ajax-multiple.php",
				"multifile":true,
				success:function(data){				
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

##html multiple
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

	</body>
	</html>

##PHP multiple
	
	<?php
	if (isset($_FILES[$_POST['campfile']]))
	{
		$fileNum= count($_FILES[$_POST['campfile']]["name"]);
		$data = array();
		for ($i=0; $i < $fileNum; $i++) { 
			$file = $_FILES["file"];
		    $nombre = $file["name"][$i];
		    $tipo = $file["type"][$i];
		    $ruta_provisional = $file["tmp_name"][$i];
		    $size = $file["size"][$i];
		    $dimensiones = getimagesize($ruta_provisional);
		    $width = $dimensiones[0];
		    $height = $dimensiones[1];
		    $carpeta = "imagen/";
		    $data[$i]['name'] = $nombre;
		    $data[$i]['error']="";
		    $data[$i]['file']="";
		    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
		    {
		      $data[$i]['error'] = "Error, el archivo no es una imagen"; 
		    }
		    else if ($size > 1024*1024)
		    {
		      $data[$i]['error'] = "Error, el tamaño máximo permitido es un 1MB";
		    }
		    else if ($width > 500 || $height > 500)
		    {
		        $data[$i]['error'] = "Error la anchura y la altura maxima permitida es 500px";
		    }
		    else if($width < 60 || $height < 60)
		    {
		        $data[$i]['error'] = "Error la anchura y la altura mínima permitida es 60px";
		    }
		    else
		    {
		        $src = $carpeta.$nombre;
		        move_uploaded_file($ruta_provisional, $src);
		        $data[$i]['file'] = $src;
		    }
		}
	}

		echo json_encode($data);
	?>


## Javascript simple

	<script type="text/javascript">
		$(function(){
			$(".botonimage").hloSubimgJs({
				"name":"file",
				"data":{},
				"fileUplaod":"image-ajax.php",
				"multifile":false,
				success:function(data){
					alert(data);					
				}				
			});
		})
	</script>

##html simple
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
					"fileUplaod":"image-ajax.php",
					"multifile":true,
					success:function(data){
						alert(data);					
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
	</body>
	</html>

## PHP simple
	<?php
		if (isset($_FILES[$_POST['campfile']]))
		{
		    $file = $_FILES[$_POST['campfile']];
		    $nombre = $file["name"];
		    $tipo = $file["type"];
		    $ruta_provisional = $file["tmp_name"];
		    $size = $file["size"];
		    $dimensiones = getimagesize($ruta_provisional);
		    $width = $dimensiones[0];
		    $height = $dimensiones[1];
		    $carpeta = "imagen/";
		    
		    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
		    {
		      echo "Error, el archivo no es una imagen"; 
		    }
		    else if ($size > 1024*1024)
		    {
		      echo "Error, el tamaño máximo permitido es un 1MB";
		    }
		    else if ($width > 500 || $height > 500)
		    {
		        echo "Error la anchura y la altura maxima permitida es 500px";
		    }
		    else if($width < 60 || $height < 60)
		    {
		        echo "Error la anchura y la altura mínima permitida es 60px";
		    }
		    else
		    {
		        $src = $carpeta.$nombre;
		        move_uploaded_file($ruta_provisional, $src);
		        echo "Imagen subida correctamente.";
		    }
		}
	?>

#Ejemplo
	http://hlosubimgjs.hlo21.com/

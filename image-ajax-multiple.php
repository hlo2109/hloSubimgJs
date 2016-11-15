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
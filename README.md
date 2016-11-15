# hloSubimgJs

## Javascript

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
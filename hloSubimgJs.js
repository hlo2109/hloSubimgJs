(function($){

	$.fn.extend({

		hloSubimgJs:function(op){
			var boton = this;
			$("#form"+op.name).remove();
			var txtor = this.text();
			var mul = "";

			var mult = "";

			if (op.multifile==true){

				mul = "[]";

				mult = "multiple";

			}		

			$("body").append('<form method="post" id="form'+op.name+'" enctype="multipart/form-data"><input type="file" name="'+op.name+mul+'" '+mult+' ><input type="hidden" name="campfile" value="'+op.name+'" > </form>');

			$("#form"+op.name).hide();

			$("input[name='"+op.name+mul+"']").on("change", function(){			

				if ($(this).val()==""){ return false; }

	            var formData = new FormData($("#form"+op.name)[0]);	            

	            interval = window.setInterval(function(){
                    var text = boton.text();
                    if (text.length < 11){
                        boton.text(text + '.');                    
                    } else {
                        boton.text('Subiendo');                
                    }
                }, 200);

	            $.ajax({

	                url: op.fileUplaod,

	                type: "POST",

	                data: formData,

	                contentType: false,

	                processData: false,

	                success: function(da){ window.clearInterval(interval); boton.text(txtor);   return op.success(da); }

	            });

	        });

			return this.each(function(){

				$(this).click(function(){

					$("#form"+op.name).find("input[type=file]").click();			

				})

			})

		}

	})

})(jQuery)
(function($){
	$.fn.extend({
		hloSubimgJs:function(op){
			$("#form"+op.name).remove();
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
	            $.ajax({
	                url: op.fileUplaod,
	                type: "POST",
	                data: formData,
	                contentType: false,
	                processData: false,
	                success: function(da){  return op.success(da); }
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
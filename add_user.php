<!DOCTYPE html>
<html>
<head>
	<title>Admin-Add-User</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<img src="https://i2.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png">

	<form id="calcform" name="calcform" action="add_form.php" method="POST">
		<input type="text" name = "person_name" placeholder="name" required="true">
		<select required name="is_admin">
  				<option value="">----IS_ADMIN----</option>
  				<option value="true">YES</option>
  				<option value="false">NO</option>
  		</select>
		<div class="form-group">
			<button type="button" title="Open File" aria-label="Open File" onclick="OnOpen()" class="btn btn-secondary">Open Image</button>
			<input type="file" id="fileElem" name="fileElem[]" accept="image/*" style="visibility:hidden; width:24px" onchange="OnFile()">
		</div>
		
		<div class="form-group">
			<label for="dropElem">Preview image here:</label>
			<div id="imgdiv"><img src="/lib/icons/material/svg/photo_white_24dp.svg" loading="lazy" width="240" height="180" alt=""><img style="display:none"></div>
		</div>
		<div class="form-group">
		<button type="button" title="Encode" class="btn btn-secondary" onclick="OnEncode()">Encode</button>
		<button type="reset" title="Reset" class="btn btn-secondary" onclick="OnReset()">Reset</button>
		</div>
		<div class="form-group">
			<label for="out1">Base64 code:</label>
			<textarea id="out1" rows="5" name="base64s" cols="60" readonly class="form-control" value="OnEncode()"></textarea>
		</div>
			<input type="submit" name="submit"> <a class="btn btn-info" href='admin.php'>HOME</a>
	</form>

</body>
<script>
	var imgh,imgw;
      $(document).ready( function() {
      	$("#imgdiv").on("dragover", function(event) {
				event.preventDefault();  
				event.stopPropagation();
				$(this).addClass('draghover');
				return false;  
			});
			$("#imgdiv").on("dragleave dragend", function(event) {
				event.preventDefault();  
				event.stopPropagation();
				$(this).removeClass('draghover');
				return false;  
			});
			$("#imgdiv").on("drop", function(event) {
				event.preventDefault();  
				//event.stopPropagation();
				$(this).removeClass('draghover');
				var file = event.originalEvent.dataTransfer.files[0]
				fileLoad(file);
			});
      });
		function OnReset()
		{
         $("#imgdiv img").hide();
         $("#imgdiv i").show();
         $("#imgdiv").css("text-align", "center");
		}	
		function OnOpen()
		{
			$("#fileElem").click();
		}
		function OnFile()
		{
			var file = document.getElementById("fileElem").files[0];
         document.getElementById("fileElem").value="";
			fileLoad(file);
		}
		function OnSave()
		{
			var file=$("#file").val();
			if( file=="" ) file="file.txt";
			fileSave(file);
		}
		function fileLoad(file)
		{
			var reader = new FileReader();
         $("#imgdiv img").prop("title",file);
			reader.onloadend=function(e) {
				//if( e.target.readyState==FileReader.DONE ) {
            var data = e.target.result;
            $("#imgdiv img").prop("src",data);
            $("#imgdiv img").on("load", function(event) {
               var divwidth=$("#imgdiv").prop("clientWidth");
               var divheight=$("#imgdiv").prop("clientHeight")-20;
               var imgheight=$("#imgdiv img").css("height");
               var imgwidth = divwidth*divheight/imgheight;
               imgh=imgheight;
               imgw=$("#imgdiv img").css("width");
               //imgh=imgh.replace("px","");
               //imgw=imgw.replace("px","");
               imgwidth+="px";
               divheight+="px";
               $("#imgdiv").css("text-align", "left");
               $("#imgdiv img").css("width", imgwidth);
               $("#imgdiv img").css("height", divheight);
               $("#imgdiv i").hide();
               $("#imgdiv img").show();
				});
			};
			reader.readAsDataURL(file);
		}
		function fileSave(filename)
		{
			var txt=$("#txt").val();
         if( txt=="" ) return;
			var blob = new Blob([txt], {type: "text/plain;charset=utf-8"});
			//FileSaver.saveAs(blob, "file.txt");
			saveAs(blob, filename);
		}
		function OnEncode()
		{
         var base64=$("#imgdiv img").prop("src");
         var i=base64.indexOf(";base64,")+8;
         var b=base64.substring(i,base64.length);
         //console.log("got b");
         $("#out1").val(b);
         $("#out2").val("<img width=\""+imgw+"\" height=\""+imgh+"\" alt=\"\" src=\""+base64+"\">");
         $("#out3").val("background-image: url(\""+base64+"\");");
		}
		function OnSelect()
		{
			$("#out1").select();
		}
		function OnCopy(n)
		{
         if( n==1 ) $("#out1").select();
         if( n==2 ) $("#out2").select();
         if( n==3 ) $("#out3").select();
			document.execCommand("copy");
		}
	</script>
</html>


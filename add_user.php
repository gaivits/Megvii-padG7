<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="add_form.php" method="POST">
	<input id="inp" type='file' required="true">
		<br>
	<input type="text" name="person_name" placeholder="ชื่อจริง">
		<br>
	<label for="out1">Base64 code:</label>
			<textarea id="b64" rows="5"  cols="60" name="base64s" readonly class="form-control" value="readFile()"></textarea>
	
	<img id="img" height="150">
	<input type="submit" value="submit">
</body>
<a href="admin.php">Home</a>
</html>
<script>
	function readFile() {
  
  if (this.files && this.files[0]) {
    
    var FR= new FileReader();
    
    FR.addEventListener("load", function(e) {
      document.getElementById("img").src       = e.target.result;
      document.getElementById("b64").innerHTML = e.target.result.replace("data:", "")
            .replace(/^.+,/, "");
    }); 
    
    FR.readAsDataURL( this.files[0] );
  }
  
}

document.getElementById("inp").addEventListener("change", readFile);
</script>
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
  <link href= "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
            crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous">
  </script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a class="navbar-brand" href="https://www.cirsa.com/" target="_blank">
                    <img src="https://i1.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png" />
            </a><button class="navbar-toggler order-last order-md-0" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
    
    <div class="collapse navbar-collapse order-last order-md-0" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
    </ul>
    </div>
    </nav>
    <form id="calcform" name="calcform" action="edit_put.php" method="POST">
        <div class="form-group">
            <?php echo "<h2>"."Person id : ".$_GET['id']."</h2>";?>
            <br>
            <input type="text" name = "person_name" placeholder="name" required="true">
                <select required name="is_admin">
                    <option value="">----IS_ADMIN----</option>
                    <option value="true">YES</option>
                    <option value="false">NO</option>
                </select>
        </div>
        <input type="submit" class="btn btn-success" value="save">
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


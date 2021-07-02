<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <img src="https://i3.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png"> 
  <br>
  <h2>Contributed By Megvii Pad G7</h2>

  <a class="btn btn-info" href='admin.php'>HOME</a> <button style="margin-left:90%;" class="btn btn-primary" onclick="exportTableToCSV('exports.csv')">Export-CSV</button>
  <input type="button" id="btnExport" value="Export-PDF" onclick="Export()" />
  <table class="table table-bordered table-sm" >
    <tr>
    <thead>
        
    </thead>
    </tr>

    <tbody id="table">
      <center><h1 style="color:#007bff;">CYN COMMUNICATION</h1></center>
    </tbody>
    
  </table>

</div>

<script>
  function fetchdata()
  {
      $.ajax({
        url: 'get_people.php',
        type: 'GET',
        success: function(data)
        {
            $("#table").html(data)
        },
        complete:function(data)
        {
            setInterval(fetchdata,6000);
        },
    });
  }
  $(document).ready(function()
  {
    setInterval(fetchdata,6000);
});
  function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
    function Export() {
            html2canvas(document.getElementById('table'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Exports.pdf");
                }
            });
        }
</script>
</body>
</html>
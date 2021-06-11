<!DOCTYPE html>
<html lang="en">
<head>
  <title>CYN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <img src="https://i3.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png">
  <br>
  <h2>Contributed By Megvii Pad G7</h2> 
  <button style="margin-left:90%;" class="btn btn-primary" onclick="exportTableToCSV('exports.csv')">Export-CSV</button>
   
  <table class="table table-bordered table-sm" >
    <thead>
      <tr>
        <th>Person_id</th>
        <th>Pass_Mode</th>
        <th>Verification_mode</th>
        <th>Liveness</th>
        <th>Liveness_score</th>
        <th>Person_name</th>
        <th>Card</th>
        <th>Time</th>
        <th>Action</th>
      </tr>

    </thead>
    <tbody id="table">
      <!--Tble_get_Value-->
    </tbody>
  </table>
</div>
<a class="btn btn-info" href='admin.php'>HOME</a>
<script>
  function fetchdata()
  {
      $.ajax({
        url: 'get_people.php',
        type: 'post',
        success: function(data)
        {
   // Perform operation on return value
          $("#table").html(data)
        },
      complete:function(data)
      {
      setTimeout(fetchdata,5000);
      }
    });
 }
  $(document).ready(function()
  {
  setTimeout(fetchdata,5000);
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
</script>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    th{ 
        color:#fff;
            }
</style>


<div class="row" style="margin-top:2em">
    <div class="col-md-10" id="myTaskListTable">
      <table class="table display" id="example">
        <thead>
          <tr>
            <th></th>
            <th>Order Number</th>
            <th>Order Type</th>
            <th>Year</th>
            <th>Account</th>
            <th>Ordered ($)</th>
            <th>Closed ($)</th>
            <th>Buyer</th>
            <th>Delivered</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td>aaaaa</td>
            <td>aaaaa</td>
            <td>2000</td>
            <td>abcde</td>
            <td>100</td>
            <td>50</td>
            <td>John Doe</td>
            <td>Yes</td>
          </tr>
          <tr>
            <td></td>
            <td>bbbbb</td>
            <td>bbbbb</td>
            <td>2001</td>
            <td>abcde</td>
            <td>50</td>
            <td>40</td>
            <td>John Doe</td>
            <td>Yes</td>
          </tr>
          <tr>
            <td></td>
            <td>ccccc</td>
            <td>ccccc</td>
            <td>1998</td>
            <td>abcdef</td>
            <td>500</td>
            <td>0</td>
            <td>John Doe</td>
            <td>No</td>
          </tr>
          <tr>
            <td></td>
            <td>ddddd</td>
            <td>ddddd</td>
            <td>1999</td>
            <td>werty</td>
            <td>300</td>
            <td>200</td>
            <td>John Doe</td>
            <td>Yes</td>
          </tr>
          <tr>
            <td></td>
            <td>eeeee</td>
            <td>eeeee</td>
            <td>1999</td>
            <td>rewqqh</td>
            <td>400</td>
            <td>399</td>
            <td>Jim Smith</td>
            <td>Yes</td>
          </tr>
          <tr>
            <td></td>
            <td>fffff</td>
            <td>fffff</td>
            <td>2002</td>
            <td>asdfgh</td>
            <td>100</td>
            <td>99</td>
            <td>John Doe</td>
            <td>Yes</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
    var myArray = [
        {'data':'person_id', },
        {'data':'person_name',},
        {'data':'verification_mode'},
        
    ]
    
    buildTable(myArray)



    function buildTable(data){
        var table = document.getElementById('myTable')

        for (var i = 0; i < data.length; i++){
            var row = `<tr>
                            <td>${data[i].person_id}</td>
                            <td>${data[i].person_name}</td>
                            <td>${data[i].verification_mode}</td>
                      </tr>`
            table.innerHTML += row


        }
    }

</script>
<?php


session_start();


require_once 'connec.php';
$db = $con->Megvii;
$col = $db->users;

if (isset($_GET['id'])) {

   $book = $col->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

}


if(isset($_POST['submit'])){


   $col->updateOne(

       ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],

       ['$set' => ["data"=>["person_name"=>$_POST["name"]]] ],

   );


   $_SESSION['success'] = "Book updated successfully";

   header("Location: gets_pass.php");

}


?>


<!DOCTYPE html>

<html>

<head>

   <title>PHP & MongoDB - CRUD Operation Tutorials - ItSolutionStuff.com</title>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>


<div class="container">

   <h1>Create Book</h1>

   <a href="gets_pass.php" class="btn btn-primary">Back</a>


   <form method="POST">

      <div class="form-group">

         <strong>Name:</strong>

         <input type="text" name="name" value="<?php echo $col->data; ?>" required="" class="form-control" placeholder="Name">

      </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>


</body>

</html>
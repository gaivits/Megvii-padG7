<?phps
	session_start();
	require 'connec.php';
	$db = $con->Megvii;
    $col = $db->users;
	$col->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
	header("Location: gets_pass.php");
?>
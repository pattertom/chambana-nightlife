<?
include 'db.php';

dbConnect();

// get the passed id
$id = $_GET['id'];

if ($id) {
    $row = mysql_fetch_array(mysql_query("SELECT * FROM image WHERE image_id=".$id));
    $image = $row['image'];

    header("Content-type: image/jpeg");
    print $image;
}
?>
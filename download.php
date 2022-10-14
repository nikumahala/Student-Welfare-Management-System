<?php
include_once('connection.php');

if(isset($_POST['download']))
{
	$eid = $_POST['e_id'];
	$query = "SELECT * from on_going_event WHERE on_id = '$eid'";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))
	{
		$filepath = 'C:/xampp/htdocs/Practicals/LAMP Project/Event_Rules/' . $row['on_pdf'];
		if (file_exists($filepath)) 
		{
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('C:/xampp/htdocs/Practicals/LAMP Project/Event_Rules/' . $row['on_pdf']));
        readfile('C:/xampp/htdocs/Practicals/LAMP Project/Event_Rules/' . $row['on_pdf']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        }
	}
}
?>
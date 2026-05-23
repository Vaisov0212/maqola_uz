<?php

require('../db/connection.php');

$subject=!empty($_POST['subject'])? trim($_POST['subject']):"";
$text=!empty($_POST['text'])? trim($_POST['text']):"";



$t_dir="../assets/post_img/";
$new_name=time()."_".basename($_FILES["photo"]["name"]);
$target=$t_dir.$new_name;
move_uploaded_file($_FILES["photo"]["tmp_name"],$target);


$sql="INSERT INTO news(subject,text,img,view) 
VALUES(
:subject,
:text,
:img,
:view
)";
$news=$conn->prepare($sql);
$news->execute([
":subject"=>$subject,
":text"=>$text,
":img"=>$new_name,
":view"=>0
]);

header("Location:create.php");


?>



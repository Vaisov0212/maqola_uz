<?php
require("conn.php");
$subject=$_POST["subject"];
$text=$_POST["text"];


$dir="posts/";

$new_name=time()."_".basename($_FILES["photo"]["name"]);/// 122687286_img1.jpg
$save_path=$dir.$new_name;
move_uploaded_file($_FILES["photo"]["tmp_name"],$save_path);


$sql="INSERT INTO posts(subject,img,text,view) VALUES(:subject,:img,:text,:view)";

$stmt=$conn->prepare($sql);
$stmt->execute([
    ":subject"=>$subject,
    ":img"=>$new_name,
    ":text"=>$text,
    ":view"=>0

]);
  echo "Saqlandi";





?>
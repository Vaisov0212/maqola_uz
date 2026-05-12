<?php

require("../db/connection.php");

$name=!empty($_POST["name"]) ? trim($_POST['name']): '';
$email=!empty($_POST["email"]) ? trim($_POST["email"]): '';
$password=!empty($_POST["password"]) ? trim($_POST["password"]): '';
$confirm_password=!empty($_POST["confirm_password"]) ? trim($_POST["confirm_password"]): '';
 echo $email . "<br>";
$errors=[];
if($name==''){
    $errors[]="Ism maydoni toldirilmagan";
}
if($email==''){
    $errors["name"]="email maydoni toldirilmagan";
}
if($password==''){
    $errors["pass"]="parol maydoni toldirilmagan";
}
if($confirm_password==''){
    $errors["con_pass"]="parol qayta  toldirilishi shart ";
}
if($confirm_password!=$password){
    $errors["pass_err"]="parol tasdiqlanmadi  ";
}

if(count($errors)>0){
    $_SESSION["reg_e"]=$errors;
    header("Location:register.php");

}else{
   $sql="SELECT * FROM users WHERE email=:email";
   $user=$conn->prepare($sql);
   $user->execute([
    ':email'=>$email
   ]);
  
if(count($count=$user->fetchAll())>0){
    $_SESSION['reg_e']=["err"=> "Bunday email bilan royxatdan otilgan "];
    header("Location:register.php");
}else{
    $has_pass=md5($password);
    $sql="INSERT INTO users(name,email,password) VALUE(:name,:email,:password)";
    $stmt=$conn->prepare($sql);
    $stmt->execute([
        ':name'=>$name,
        ':email'=>$email,
        ':password'=>$has_pass
    ]);
     header("Location:login.php");
}




}



?>
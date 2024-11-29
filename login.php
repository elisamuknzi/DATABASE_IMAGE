<?php
$server = "localhost";
$user = "root";
$password = "blackhat";
$database = "VES";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name1 = htmlspecialchars($_POST["name"]);
    $name2 = htmlspecialchars($_POST["name2"]);
    $id = htmlspecialchars($_POST["index"]);
    $name = $name1."  ".$name2;
    $email= htmlspecialchars($_POST["email"]);
    $S_password= htmlspecialchars($_POST["password"]);
}
$mc = new mysqli($server,$user,$password,$database);
if($mc){
    //die("Connected!");
    $sql = "SELECT * FROM STUDENTS WHERE S_ID =$id;";
    $out = $mc->query($sql);
    if($out->num_rows == 0){
die("<script>alert('Wrong index Number . Please,Try again');window.location.href='login.html';</script>");
    }
    else{
        //die("continue");
       $sql2 = "SELECT * FROM STUDENTS WHERE S_NAME ='$name';";
       $out2 = $mc->query($sql2);
       if($out2->num_rows ==0){
        die("<script>alert('Wrong User name. Please,Try again');window.location.href='login.html';</script>");
       }
       else{
        $sql23= "SELECT * FROM STUDENTS WHERE S_PASS ='$S_password';";
        $out23 = $mc->query($sql23);
        if($out23->num_rows == 0){
            die("<script>alert('Wrong Password. Please,Try again');window.location.href='login.html';</script>");
        }
        else{
echo "<script>window.location.href='help.html'</script>";
        }
       }
    }
    $mc->close();
}
else{
    die("Connection Erro!");
    die("<br>");
    die("Error connecting to server: $server");
}
?>
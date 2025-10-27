<?php
// session_start();

// // Se não está logado, vai para o login
// if (!isset($_SESSION['usuario'])) { 
//     header('Location: login.php'); 
//     exit(); 
// }

// if($_POST && $_POST['request']){
//     // inclui o bd
//     include 'conn.php';

//     // normaliza tudo em váriaveis
//     $schedule = $_POST['schedule'];
//     $donation = $_POST['donation'];
//     $cep = $_POST['CEP-donate'];
//     $street = $_POST['street-donate'];
//     $phone = $_POST['phone-donate'];
//     $referencepoint = $_POST['refpoint-donate'];
//     $user = $_SESSION['usuario']['id'];

//     $stmt = "INSERT INTO pedidos(usuario_id, diaentrega, cep, rua, pontoref) VALUES ('$user', '$schedule', '$cep', '$street', '$referencepoint')";
//     $conn->query($stmt);
//     header('Location: thanks.php');
// } else {
//     header('Location: index.php');
// }
?>

<?php
session_start();



$server = "localhost";
$user = "root";
$pass = "";
$dbName = "db_php"; // colocar nome do db
$connect = mysqli_connect($server, $user, $pass, $dbName);

function login($connect) {
    if(isset($_POST['logar'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = mysqli_real_escape_string($connect, $email);
        $senha = sha1($_POST['senha']);

        if(!empty($email) and !empty($senha)) {
            $query = "SELECT *FROM users WHERE email = '$email' AND senha = '$senha' ";

            $action = mysqli_query($connect, $query);
            $result = mysqli_fetch_assoc($action);
            if(!empty($result)) {
                session_start();
                $_SESSION['nome'] = $result['nome'];
                $_SESSION['active'] = true;
                header("location: adm_inicio.php");
            } else {
                $_SESSION['error_message'] = "Email ou senha incorretos";
            }
        }
    }
}


function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: /texasBurguer/admin");
}
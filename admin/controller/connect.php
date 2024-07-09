
<?php
session_start();



$server = "localhost";
$user = "root";
$pass = "";
$dbName = "hamburgueria_bd"; // colocar nome do db
$connect = mysqli_connect($server, $user, $pass, $dbName);

function login($connect) {
    if(isset($_POST['logar'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = mysqli_real_escape_string($connect, $email);
        $senha = sha1($_POST['senha']);

        if(!empty($email) and !empty($senha)) {
            $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";

            $action = mysqli_query($connect, $query);
            $result = mysqli_fetch_assoc($action);
            if(!empty($result)) {
                session_start();
                $_SESSION['nome'] = $result['nome_user'];
                $_SESSION['avatar'] = $result['img_user'];
                $_SESSION['active'] = true;
                header("location: adm_inicio.php");
            } else {
                $_SESSION['error_message'] = "Email ou senha incorretos";
            }
        }
    }
}




// testes

function buscarUnidadePorId($connect) {
    if(isset($_POST['buscar_unidade'])) {
        $id = $_POST['user'];

        if(!empty($id)) {
            // Consulta SQL com consulta preparada
            $query = "SELECT * FROM unidades WHERE id = ?";
            $stmt = mysqli_prepare($connect, $query);
            
            // Vincula o parâmetro $id à consulta preparada
            mysqli_stmt_bind_param($stmt, "i", $id);
            
            // Executa a consulta
            mysqli_stmt_execute($stmt);
            
            // Obtém o resultado da consulta
            $result = mysqli_stmt_get_result($stmt);
            
            // Verifica se há resultados e recupera os dados
            if(mysqli_num_rows($result) > 0) {
                $unidade = mysqli_fetch_assoc($result);
                
                // Atribui os valores diretamente às variáveis
                $nome = $unidade['nome_unidade'];
                $endereco = $unidade['endereco_unidade'];
                $cidade = $unidade['cidade'];
                $uf = $unidade['uf'];
                $telefone = $unidade['contato_unidade'];
                $hora_abertura = $unidade['hora_abertura'];
                $hora_fechamento = $unidade['hora_fechamento'];
                $foto_unidade = $unidade['foto_unidade'];
                
                // Retorna os dados diretamente (sem array)
                return array(
                    'nome' => $nome,
                    'endereco' => $endereco,
                    'cidade' => $cidade,
                    'uf' => $uf,
                    'telefone' => $telefone,
                    'hora_abertura' => $hora_abertura,
                    'hora_fechamento' => $hora_fechamento,
                    'foto_unidade' => $foto_unidade
                );
            } else {
                echo "Nenhuma unidade encontrada com o ID: $id";
            }
            
            // Fecha a consulta preparada
            mysqli_stmt_close($stmt);
        }
    }

    // Retorna null se não encontrar a unidade
    return null;
}







function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: /texasBurguer/admin");
}
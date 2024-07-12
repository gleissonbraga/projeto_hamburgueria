<?php


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
                $_SESSION['id'] = $result['id'];
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

function delete($connect, $tabela, $id){
    if(!empty($id)){
        $query = "DELETE FROM $tabela where id =" . (int)$id;
        $delete = mysqli_query($connect, $query);
        if($delete) {
            echo "Usuário excluido com sucesso!";
        } else {
            echo "Usuário não existe!";
        }
    }
}

function updateUser($connect) {
    if(isset($_POST['atualizar']) AND !empty($_POST['email'])) {
        $erros = array();
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = "";
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }



        if(strlen($nome) < 4) {
            $erros[] = "Preencha seu nome completo";
        }

        if(empty($email)) {
            $erros[] = "Preencha seu e-mail corretamente";
        }

        if(!empty($_POST['senha'])) {
            if($_POST['senha'] == $_POST['repete_senha']) {
                $senha = sha1($_POST['senha']);
            } else {
                $erros[] = "Senhas não conferem!";
            }
        }

        $queryEmailAtual = "SELECT email FROM usuarios WHERE id = '$id'";
        $buscaEmailAtual = mysqli_query($connect, $queryEmailAtual);
        $returnEmail = mysqli_fetch_assoc($buscaEmailAtual);



        $queryEmail = "SELECT email FROM usuarios WHERE email = '$email' AND email <> '" . $returnEmail['email'] . "'";
        
        $buscaEmail = mysqli_query($connect, $queryEmail);
        $verifica = mysqli_num_rows($buscaEmail);

        if(!empty($verifica)) {
            $erros[] = "E-mail já cadastrado!";
        }

        if(empty($erros)) {
            if (!empty($senha) and !empty($imagem)) {
                $query = "UPDATE usuarios SET nome_user = '$nome', email = '$email', senha = '$senha', img_user = '$imagem' WHERE id =" . (int) $id;
            } else {
                $query = "UPDATE usuarios SET nome_user = '$nome', email = '$email' WHERE id =" . (int) $id;
            }
           
            $executar = mysqli_query($connect, $query);

            if($executar) {
                echo "Usuário atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar usuário";
            }

        } else {
            foreach ($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }

    }
}

function updateProdutos() {
    
}



function buscarUnidadePorId($connect) {
    if(isset($_POST['buscar_unidade']) && !empty($_POST['user'])){
        $id = $_POST['user'];
        $query = "SELECT * FROM unidades WHERE id = $id";
        $result = mysqli_query($connect, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $busca_unidade =  mysqli_fetch_assoc($result);
        } else {
            echo "teste";
        }
    }
    return $busca_unidade;
}

function buscarId($connect, $tabela, $id){
    $query = "SELECT * FROM $tabela WHERE id =" . (int)$id;
    $busca = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($busca);
    return $result;
}



function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: /texasBurguer/admin");
}

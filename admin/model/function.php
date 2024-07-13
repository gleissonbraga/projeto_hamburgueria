<?php

function dadosDasTabelas($table, $ordem) {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);

    $table = mysqli_real_escape_string($connect, $table);
    $ordem = mysqli_real_escape_string($connect, $ordem);
    $query = "SELECT * FROM `$table` ORDER BY `$ordem`";
    $action = mysqli_query($connect, $query);
    $users = mysqli_fetch_all($action, MYSQLI_ASSOC);
    return $users;
}

function destaque() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);

    $query = "SELECT * FROM hamburguer WHERE destaque = '1' LIMIT 3";

    $executar = mysqli_query($connect, $query);
    $destaques = mysqli_fetch_all($executar, MYSQLI_ASSOC);
    return $destaques;
}

function criarUsuario() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);


    if(isset($_POST['cadastrar'])) {
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = mysqli_real_escape_string($connect, $email);
        $senha = sha1($_POST['senha']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }

        $query = "INSERT INTO usuarios (nome_user, email, senha, img_user, data_usuario) VALUES ('$nome', '$email', '$senha', '$imagem', NOW())";

        $insert = mysqli_query($connect, $query);
        if($insert) {
            header("Location: criar_usuario.php");
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    }
}



function criarHamburguer() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);


    if(isset($_POST['cadastrar'])) {
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $destaque = $_POST['destaque'];
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";
        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        if($destaque == true) {
            $destaque = "1";
        } else {
            $destaque = "0";
        }



        $query = "INSERT INTO hamburguer (nome_hamburguer, descricao_hamburguer, preco_hamburguer, foto_hamburguer, destaque, data_hamburguer) VALUES ('$nome', '$descricao', '$preco', '$imagem', '$destaque', NOW())";

        $insert = mysqli_query($connect, $query);
        if($insert) {
            header("Location: criar_hamburguer.php");
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    }
}

function criarPorcao() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);


    if(isset($_POST['cadastrar'])) {
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        $query = "INSERT INTO porcao (nome_porcao, descricao_porcao, preco_porcao, foto_porcao, data_porcao) VALUES ('$nome', '$descricao', '$preco', '$imagem', NOW())";

        $insert = mysqli_query($connect, $query);
        if($insert) {
            header("Location: criar_usuario.php");
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    }
}


function criarBebida() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);


    if(isset($_POST['cadastrar'])) {
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        $query = "INSERT INTO bebida (nome_bebida, descricao_bebida	, preco_bebida, foto_bebida, data_bebida) VALUES ('$nome', '$descricao', '$preco', '$imagem', NOW())";

        $insert = mysqli_query($connect, $query);
        if($insert) {
            header("Location: criar_usuario.php");
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    }
}


function criarUnidade() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "hamburgueria_bd";
    $connect = mysqli_connect($server, $user, $pass, $dbName);


    if(isset($_POST['cadastrar'])) {
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $endereco = mysqli_real_escape_string($connect, $_POST['endereco']);
        $cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
        $uf = mysqli_real_escape_string($connect, $_POST['uf']);
        $telefone = mysqli_real_escape_string($connect, $_POST['telefone']);
        $hora_abertura = mysqli_real_escape_string($connect, $_POST['hora_abertura']);
        $hora_fechamento = mysqli_real_escape_string($connect, $_POST['hora_fechamento']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        $query = "INSERT INTO unidades (nome_unidade, endereco_unidade, cidade, uf, contato_unidade, hora_abertura, hora_fechamento, foto_unidade, data_unidade) VALUES ('$nome', '$endereco', '$cidade', '$uf', '$telefone', '$hora_abertura', ' $hora_fechamento', '$imagem', NOW())";

        $insert = mysqli_query($connect, $query);
        if($insert) {
            header("Location: criar_usuario.php");
            echo "Usuário cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o usuário";
        }
    }
}

function uploadImage($caminho){
    if (!empty($_FILES['imagem']['name'])) {
         
         $nomeImagem = $_FILES['imagem']['name'];
         $tipo = $_FILES['imagem']['type'];
         $nomeTemporario = $_FILES['imagem']['tmp_name'];
         $tamanho = $_FILES['imagem']['size'];
         $erros = array();

         $tamanhoMaximo = 1024 * 1024 * 5; //5MB
         if ($tamanho > $tamanhoMaximo) {
             $erros[] = "Sua imagem excede o tamanho máximo<br>";
         }

         $imagemsPermitidos = ["png", "jpg", "jpeg"];
         $extensao = pathinfo($nomeImagem, PATHINFO_EXTENSION);
         if ( !in_array($extensao, $imagemsPermitidos) ) {
             $erros[] = "imagem não permitido.<br>";
         }

        $typesPermitidos = ["image/png", "image/jpg", "image/jpeg"];
        if ( !in_array($tipo, $typesPermitidos) ) {
             $erros[] = "Tipo de imagem não permitido.<br>";
        }

        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo $erro;
            }
        }else{
            // $caminho = "uploads/";
            $hoje = date("d-m-Y_h-i");
            $novoNome = $hoje . "-" . $nomeImagem;
            if(move_uploaded_file($nomeTemporario, $caminho.$novoNome)) {
                return $novoNome;
            }else{
                return FALSE;
            }

        }
     }

}
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
            echo "<div class='w-50'>
                    <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Deletado com sucesso</p>
                </div>";
        } else {
            echo "<div class='w-50'>
                    <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao excluir</p>
                </div>";
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
                echo "<div class='w-50'>
                        <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Usuário atualizado com sucesso</p>
                    </div>";
            } else {
                echo "<div class='w-50'>
                        <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao atualizar usuário</p>
                    </div>";
            }

        } else {
            foreach ($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }

    }
}

function updateHamburguer($connect) {
    if(isset($_POST['atualizar'])) {
        $erros = [];
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $destaque = !empty($_POST['destaque']) ? 1 : 0;
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        if(empty($nome)){
            $erros[] = "Insira um nome para o hamburguer";
        }

        if(empty($descricao)){
            $erros[] = "Insira uma descricao para o hamburguer";
        }

        if(empty($preco)){
            $erros[] = "Insira um preço para o hamburguer";
        }

        if(empty($erros)) {
            if(!empty($imagem)) {
                 $query = "UPDATE hamburguer SET nome_hamburguer = '$nome', descricao_hamburguer = '$descricao', preco_hamburguer = '$preco', foto_hamburguer = '$imagem', destaque = '$destaque' WHERE id =" . (int)$id;
            } else {
                 $query = "UPDATE hamburguer SET nome_hamburguer = '$nome', descricao_hamburguer = '$descricao', preco_hamburguer = '$preco', destaque = '$destaque' WHERE id =" . (int)$id;
            }

            $executar = mysqli_query($connect, $query);
        
            if($executar) {
                echo    "<div class='w-50'>
                            <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Hamburguer atualizado com sucesso</p>
                        </div>";
            } else {
                echo    "<div class='w-50'>
                            <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao atualizar o hamburguer</p>
                        </div>";
            }
        } else {
            foreach($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }
    }
}

function updatePorcao($connect) {
    if(isset($_POST['atualizar'])) {
        $erros = [];
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        if(empty($nome)){
            $erros[] = "Insira um nome para a porção";
        }

        if(empty($descricao)){
            $erros[] = "Insira uma descricao para a porção";
        }

        if(empty($preco)){
            $erros[] = "Insira um preço para a porção";
        }

        if(empty($erros)) {
            if(!empty($imagem)) {
                $query = "UPDATE porcao SET nome_porcao = '$nome', descricao_porcao = '$descricao', preco_porcao = '$preco', foto_porcao = '$imagem' WHERE id =" . (int)$id;
            } else {
                $query = "UPDATE porcao SET nome_porcao = '$nome', descricao_porcao = '$descricao', preco_porcao = '$preco' WHERE id =" . (int)$id;
            }
            
            $executar = mysqli_query($connect, $query);
            
            if($executar) {
                echo    "<div class='w-50'>
                            <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Porção atualizada com sucesso</p>
                        </div>";
            } else {
                echo    "<div class='w-50'>
                            <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao atualizar a porção</p>
                        </div>";
            }
            
        } else {
            foreach($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }
    }
}

function updateBebida($connect) {
    if(isset($_POST['atualizar'])) {
        $erros = [];
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $descricao = mysqli_real_escape_string($connect, $_POST['descricao']);
        $preco = mysqli_real_escape_string($connect, $_POST['preco']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        if(empty($nome)){
            $erros[] = "Insira um nome para a bebida";
        }

        if(empty($descricao)){
            $erros[] = "Insira uma descricao para a bebida";
        }

        if(empty($preco)){
            $erros[] = "Insira um preço para a bebida";
        }

        if(empty($erros)) {
            if(!empty($imagem)) {
                $query = "UPDATE bebida SET nome_bebida = '$nome', descricao_bebida = '$descricao', preco_bebida = '$preco', foto_bebida = '$imagem' WHERE id =" . (int)$id;
            } else {
                $query = "UPDATE bebida SET nome_bebida = '$nome', descricao_bebida = '$descricao', preco_bebida = '$preco' WHERE id =" . (int)$id;
            }

            $executar = mysqli_query($connect, $query);
        
            if($executar) {
                echo    "<div class='w-50'>
                            <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Bebida atualizada com sucesso</p>
                        </div>";
            } else {
                echo    "<div class='w-50'>
                            <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao atualizar a bebida</p>
                        </div>";
            }
            
        } else {
            foreach($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }

    }
}

function updateUnidade($connect) {
    if(isset($_POST['atualizar'])) {
        $erros = [];
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $nome = mysqli_real_escape_string($connect, $_POST['nome']);
        $endereco = mysqli_real_escape_string($connect, $_POST['endereco']);
        $cidade = mysqli_real_escape_string($connect, $_POST['cidade']);
        $uf = mysqli_real_escape_string($connect, $_POST['uf']);
        $contato = mysqli_real_escape_string($connect, $_POST['contato_unidade']);
        $hora_abertura = mysqli_real_escape_string($connect, $_POST['hora_abertura']);
        $hora_fechamento = mysqli_real_escape_string($connect, $_POST['hora_fechamento']);
        $imagem = !empty($_FILES['imagem']['name']) ? $_FILES['imagem']['name'] : "";

        if(!empty($imagem)) {
            $caminho = "model/uploads/";
            $imagem = uploadImage($caminho);
        }


        if(empty($nome)){
            $erros[] = "Insira um nome para a unidadae";
        }

        if(empty($endereco)){
            $erros[] = "Insira um endereço";
        }

        if(empty($cidade)){
            $erros[] = "Insira a cidade";
        }

        if(empty($uf)){
            $erros[] = "Insira uma UF";
        }

        if(empty($contato)){
            $erros[] = "Insira um número de telefone";
        }

        if(empty($hora_abertura)){
            $erros[] = "Insira uma hora de abertura";
        }

        if(empty($hora_fechamento)){
            $erros[] = "Insira uma hora de fechamento";
        }


        if(empty($erros)) {
            if(!empty($imagem)) {
                $query = "UPDATE unidades SET nome_unidade = '$nome', endereco_unidade = '$endereco', cidade = '$cidade', uf = '$uf', contato_unidade = '$contato', hora_abertura = '$hora_abertura', hora_fechamento = '$hora_fechamento', foto_unidade = '$imagem' WHERE id =" . (int)$id;
            } else {
                $query = "UPDATE unidades SET nome_unidade = '$nome', endereco_unidade = '$endereco', cidade = '$cidade', uf = '$uf', contato_unidade = '$contato', hora_abertura = '$hora_abertura', hora_fechamento = '$hora_fechamento' WHERE id =" . (int)$id;
            }

            $executar = mysqli_query($connect, $query);
        
            if($executar) {
                echo    "<div class='w-50'>
                            <p class='bg-success text-white rounded w-50 p-2 mt-1 text-center'>Unidade atualizada com sucesso</p>
                        </div>";
            } else {
                echo    "<div class='w-50'>
                            <p class='bg-danger text-white rounded w-50 p-2 mt-1 text-center'>Erro ao atualizar a unidade</p>
                        </div>";
            }
            
        } else {
            foreach($erros as $erro) {
                echo "<p>$erro</p>";
            }
        }

    }
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


function efeitoDestaque($destaque) {
    if($destaque == "1") {
        echo "<p class='destaque-check-green'><ion-icon name='chevron-down-circle'></ion-icon></p>";
    } else {
        echo "<p class='destaque-check-red'><ion-icon name='close-circle'></ion-icon></p>";
    }     
}

function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("Location: /texasBurguer/admin");
}

<?php
require_once 'config.php';

// Consulta SQL para obter as informações do usuário
$sql = "SELECT * FROM usuario ORDER BY id DESC LIMIT 1";
$resultado = $conn->query($sql);

// Verifique se há resultados e exiba as informações do usuário
if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $nome = $row['nome'];
    $idade = $row['idade'];
    $rua = $row['rua'];
    $bairro = $row['bairro'];
    $estado = $row['estado'];
    $biografia = $row['biografia'];
} else {
    echo "Nenhum registro encontrado.";
}

// Fechar a conexão
$conn->close(); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Perfil de Usuário</title>
    <style>
        .update {
            display: none;
        }
    </style>
</head>

<body>
    <section class="secao-perfil">
        <div class="header-perfil">
            <div class="pagina-perfil">
                <div class="avatar-perfil">
                    <img src="assets/img/avatarIcon.png" alt="img-avatar">
                    <button type="button" class="botao-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="body-perfil">
            <div class="bio-perfil">
                <h3 id="nome" class="titulo"> <?php echo $row['nome']; ?></h3>
                <p id="biografia" class="texto"> <?php echo $row['biografia']; ?></p>
            </div>
            <div class="footer-perfil">
                <ul class="lista-dados">
                    <div>
                        <i class="icon fa-solid fa-address-card"></i>
                        <li id="idade">Idade: <?php echo $row['idade']; ?></li>
                    </div>
                    <div>
                        <i class="icon fa-solid fa-map-location-dot"></i>
                        <li id="rua">Rua: <?php echo $row['rua']; ?></li>
                    </div>
                    <div>
                        <i class="icon fa-solid fa-map-location"></i>
                        <li id="bairro">Bairro: <?php echo $row['bairro']; ?></li>
                    </div>
                    <div>
                        <i class="icon fa-solid fa-map"></i>
                        <li id="estado">Estado: <?php echo $row['estado']; ?></li>
                    </div>
                </ul>
            </div>

            <button class="botao-editar" onclick="mostrarFormulario()">
                <h5>Editar Informações</h5>
            </button>

            <div class="update" id="formularioAtualizacao">
                <h2>Atualizar Informações</h2>
                <form onsubmit="return atualizarInformacoes(event)" action="processar-dados.php" method="post">
                    <!-- Campos do formulário -->
                    <label for="nomeInput">Nome:</label>
                    <input type="text" id="nomeInput" name="nomeInput" required><br><br>

                    <label for="idadeInput">Idade:</label>
                    <input type="text" id="idadeInput" name="idadeInput" required><br><br>

                    <label for="ruaInput">Rua:</label>
                    <input type="text" id="ruaInput" name="ruaInput" required><br><br>

                    <label for="bairroInput">Bairro:</label>
                    <input type="text" id="bairroInput" name="bairroInput" required><br><br>

                    <label for="estadoInput">Estado:</label>
                    <input type="text" id="estadoInput" name="estadoInput" required><br><br>

                    <label for="biografiaInput">Biografia:</label><br>
                    <textarea name="biografiaInput" id="biografiaInput" placeholder="Insira aqui sua biografia" required
                        rows="4"></textarea><br><br>

                    <input type="submit" value="Atualizar">
                    <button type="button" class="botao-cancelar" onclick="fecharFormulario()">Cancelar</button>
                </form>
            </div>
            <footer>
                <div class="redes-sociais">
                    <a href="" class="botao-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                    <a href="https://www.linkedin.com/company/sync360-io/"
                        class="botao-redes linkedin fa-brands fa-linkedin" target="_blank"><i
                            class="icon-linkedin"></i></a>
                    <a href="https://www.instagram.com/sync360.io/" class="botao-redes instagram fab fa-instagram"
                        target="_blank"><i class="icon-instagram"></i></a>
                </div>
            </footer>
        </div>
    </section>
    <footer>
        <div style="position: relative; margin-top: auto;">
            <div class="minhas-redes"
                style="display: block;position: absolute;bottom: -13rem;left: 1rem;opacity: 0.5;z-index: 1000;">
                <p style="font-size: .75rem;">Desenvolvido por Gabriel Silva ©</p>
                <div>
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                    <a target="_blank" href="https://www.instagram.com/gabriel.almeida.__/"><i
                            class="fab fa-instagram"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/in/gabriel-silva-477557306/"><i
                            class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function mostrarFormulario() {
            document.getElementById("formularioAtualizacao").style.display = "block";
            document.querySelector(".botao-editar").style.display = "none";
        }

        function fecharFormulario() {
            document.getElementById("formularioAtualizacao").style.display = "none";
            document.querySelector(".botao-editar").style.display = "block";

        }

        function atualizarInformacoes(event) {
            // event.preventDefault();

            var nome = document.getElementById("nomeInput").value;
            var idade = document.getElementById("idadeInput").value;
            var rua = document.getElementById("ruaInput").value;
            var bairro = document.getElementById("bairroInput").value;
            var estado = document.getElementById("estadoInput").value;
            var biografia = document.getElementById("biografiaInput").value;

            console.log("Nome: ", nome);
            console.log("Idade: ", idade);
            console.log("Rua: ", rua);
            console.log("Bairro: ", bairro);
            console.log("Estado: ", estado);
            console.log("Biografia: ", biografia);

            if (nome === '' || idade === '' || rua === '' || bairro === '' || estado === '' || biografia === '') {
                alert("Por favor, preencha todos os campos antes de atualizar as informações.");
                return false; // Impede o envio do formulário
            }

            document.getElementById("nome").textContent = nome;
            document.getElementById("idade").textContent = "Idade: " + idade + " anos";
            document.getElementById("rua").textContent = "Rua: " + rua;
            document.getElementById("bairro").textContent = "Bairro: " + bairro;
            document.getElementById("estado").textContent = "Estado: " + estado;
            document.getElementById("biografia").textContent = biografia;

            
            document.getElementById("formularioAtualizacao").style.display = "none";
            
            fecharFormulario();
            
            alert("Informações atualizadas com sucesso!");
            
            // document.getElementById("formAtualizar").reset();
            // event.target.reset();
            // return false;
        }
    </script>
</body>

</html>
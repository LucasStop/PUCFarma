<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Agosto/2022
---------------------------------------------------------------------------------->
<!-- medIncluir_exe.php -->

<html>

<head>

	<title>PUC Farma</title>
	<link rel="icon" type="image/png" href="../images/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="../css/customize.css">
</head>

<body onload="w3_show_nav('menuProduto')">
	<!-- Inclui MENU.PHP  -->
	<?php require '../geral/menu.php'; ?>
	<?php require '../bd/conectaBD.php'; ?>
	<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

		<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
			<p class="w3-large">
			<div class="w3-code cssHigh notranslate">
				<!-- Acesso em:-->
				<?php

				date_default_timezone_set("America/Sao_Paulo");
				$data = date("d/m/Y H:i:s", time());
				echo "<p class='w3-small' > ";
				echo "Acesso em: ";
				echo $data;
				echo "</p> "
				?>

				<!-- Acesso ao BD-->
				<?php
				$nome    = $_POST['Nome'];
				$descricao = $_POST['Descricao'];
				$preco  = $_POST['Preco'];
				$estoque = $_POST['Estoque'];
				$codigo_barras = $_POST['Codigo_Barras'];
				$id_categoria = $_POST['Id_Categoria'];

				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("<strong> Falha de conexão: </strong>" . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português
				mysqli_query($conn, "SET NAMES 'utf8'");
				mysqli_query($conn, 'SET character_set_connection=utf8');
				mysqli_query($conn, 'SET character_set_client=utf8');
				mysqli_query($conn, 'SET character_set_results=utf8');

				// Faz Select na Base de Dados

				$sql = "INSERT INTO Produto (Nome, Descricao, Preco, Estoque, Codigo_Barras, Id_Categoria) VALUES ('$nome', '$descricao', '$preco', '$estoque', '$codigo_barras', '$id_categoria')";
				?>
				<div class='w3-responsive w3-card-4'>
					<div class="w3-container w3-theme">
						<h2>Inclusão de Novo Produto</h2>
					</div>
					<?php
					if ($result = mysqli_query($conn, $sql)) {
						echo "<p>&nbsp;Registro cadastrado com sucesso! </p>";
					} else {
						echo "<p>&nbsp;Erro executando INSERT: " . mysqli_error($conn . "</p>");
					}
					echo "</div>";
					mysqli_close($conn);  //Encerra conexao com o BD

					?>
				</div>
			</div>


			<?php require '../geral/sobre.php'; ?>
			<!-- FIM PRINCIPAL -->
		</div>
		<!-- Inclui RODAPE.PHP  -->
		<?php require '../geral/rodape.php'; ?>

</body>

</html>
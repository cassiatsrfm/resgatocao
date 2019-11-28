<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Formulário</title>

<link rel="stylesheet" type="text/css" href="inicio.css">

</head>
<body>

	<h1> Aqui estão as informações que você cadastrou:</h1>

</br>	

<?php

$nome =       $_POST["nome"] ;
$senha=       $_POST["senha"];

?>

<ol>
<li> <em> Nome: 			 </em> <?php echo $nome; 		?> </li>
<li> <em> Sua senha:		 </em> <?php echo $senha;		?> </li>
</ol>

</body>
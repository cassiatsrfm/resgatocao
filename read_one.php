<!DOCTYPE HTML>
<html>
<head>
<title>PDO - Read One Record - PHP CRUD Tutorial</title>
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<!-- container -->
<div class="container">
<div class="page-header">
<h1> Página do usuário</h1>
</div>
<!-- PHP read one record will be here -->


<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
//include database connection
include 'config/conexao.php';
// read current record's data
try {
// prepare select query
$query = "SELECT nome_usuario, nome_completo, telefone, email, endereco FROM usuario WHERE id = ? LIMIT 0,1";
$stmt = $con->prepare( $query );
// this is the first question mark
$stmt->bindParam(1, $id);
// execute our query
$stmt->execute();
// store retrieved row to a variable

$row = $stmt->fetch(PDO::FETCH_ASSOC);
// values to fill up our form
$nome_usuario 	= $row['nome_usuario'];
$nome_completo 	= $row['nome_completo'];
$telefone 		= $row['telefone'];
$email 			= $row['email'];
$endereco	 	= $row['endereco'];

}
// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
?>

<!-- HTML read one record table will be here -->
<!--we have our html table here where the record will be displayed-->
<table class='table table-hover table-responsive table-bordered'>



<tr>
<td>Nome Usuário</td>
<td><?php echo htmlspecialchars($nome_usuario, ENT_QUOTES); ?></td>
</tr>

<tr>
<td>Nome Completo</td>
<td><?php echo htmlspecialchars($nome_completo, ENT_QUOTES); ?></td>
</tr>

<tr>
<td>Telefone</td>
<td><?php echo htmlspecialchars($telefone, ENT_QUOTES); ?></td>
</tr>

<tr>
<td>E-mail</td>
<td><?php echo htmlspecialchars($email, ENT_QUOTES); ?></td>
</tr>
<tr>

<tr>
<td>Endereço</td>
<td><?php echo htmlspecialchars($endereco, ENT_QUOTES); ?></td>
</tr>
<tr>

<td></td>
<td>


<a href='index.php' class='btn btn-danger'>Voltar a ler usuários</a>
</td>
</tr>
</table>
</div> <!-- end .container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
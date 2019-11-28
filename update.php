<!DOCTYPE HTML>
<html>
<head>
<title>PDO - Update a Record - PHP CRUD Tutorial</title>
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
<!-- container -->
<div class="container">
<div class="page-header">
<h1>Atualizar informações de usuário</h1>
</div>
<!-- PHP read record by ID will be here -->
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
//include database connection
include 'config/conexao.php';
// read current record's data
try {
// prepare select query
$query = "SELECT nome_usuario, nome_completo, telefone, email, endereco, senha FROM usuario WHERE id = ? LIMIT 0,1";

$stmt = $con->prepare( $query );
// this is the first question mark
$stmt->bindParam(1, $id);
// execute our query
$stmt->execute();
// store retrieved row to a variable
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// values to fill up our form

$nome_usuario		= $row['nome_usuario'];
$nome_completo 		= $row['nome_completo'];
$telefone 			= $row['telefone'];
$email 				= $row['email'];
$endereco 			= $row['endereco'];
$senha 				= $row['senha'];
}


// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
?>
<!-- PHP post to update record will be here -->
<?php
// check if form was submitted
if($_POST){
try{
// write update query
// in this case, it seemed like we have so many fields to pass and
// it is better to label them and not use question marks
$query = "UPDATE usuario SET nome_usuario=:nome_usuario, nome_completo=:nome_completo, telefone=:telefone, email=:email, endereco=:endereco, senha=:senha WHERE id = :id";
// prepare query for execution
$stmt = $con->prepare($query);
// posted values
    $nome_usuario       = htmlspecialchars(strip_tags($_POST['nome_usuario']));
    $nome_completo      = htmlspecialchars(strip_tags($_POST['nome_completo']));
    $telefone           = htmlspecialchars(strip_tags($_POST['telefone']));
    $email              = htmlspecialchars(strip_tags($_POST['email']));
    $endereco           = htmlspecialchars(strip_tags($_POST['endereco']));
    $senha              = htmlspecialchars(strip_tags($_POST['senha']));

// bind the parameters
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':nome_completo', $nome_completo);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id', $id);

// Execute the query
if($stmt->execute()){
echo "<div class='alert alert-success'>Registro Atualizado.</div>";
}else{
echo "<div class='alert alert-danger'>Não foi possível atualizar o
registro. Tente novamente.</div>";
}
}
// show errors
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());

}
}
?>

<!-- HTML form to update record will be here -->
<!--we have our html form here where new record information can be updated-->
<form action="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
<table class='table table-hover table-responsive table-bordered'>

<tr>
<td>Nome Usuário</td>
<td><input type='text' name='nome_usuario' value="<?php echo htmlspecialchars($nome_usuario, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td>Nome Completo</td>
<td><input type='text' name='nome_completo' value="<?php echo htmlspecialchars($nome_completo, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td>Telefone</td>
<td><input type='text' name='telefone' value="<?php echo htmlspecialchars($telefone, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td> E-mail</td>
<td><input type='text' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td>Endereço</td>
<td><input type='text' name='endereco' value="<?php echo htmlspecialchars($endereco, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td>Senha</td>
<td><input type='text' name='senha' value="<?php echo htmlspecialchars($senha, ENT_QUOTES); ?>" class='form-control' /></td>
</tr>

<tr>
<td></td>

<td>

<input type='submit' value='Salvar Alterações' class='btn btn-primary' />

<a href='index.php' class='btn btn-danger'>Voltar a ler registros</a>
</td>

</tr>
</table>
</form>
</div> <!-- end .container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
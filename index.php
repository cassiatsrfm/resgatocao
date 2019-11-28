<!DOCTYPE HTML>
<html>
<head>
<title>PDO – Ler Registros - PHP CRUD Tutorial</title>
  
  <link rel="stylesheet" type="text/css" href="inicio.css">
  
<!-- Latest compiled and minified Bootstrap CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- custom css -->
<style>
.m-r-1em { margin-right:1em; }
.m-b-1em { margin-bottom:1em; }
.m-l-1em { margin-left:1em; }
.mt0	 { margin-top:0; }
</style>
</head>
<body>

	<div class="topnav">

       <img src="img/logo2.jpeg" style="height: 60px; width: 170px; margin-left: 80px; margin-top: 27px;">
          

          <a href="encontrados.html"> Animais Encontrados </a>
          <a href="perdidos.html"> Animais Perdidos </a>
          <a href="inicio.html"> Sobre nós </a>
           <a href="login.html"><img src="img/usuariooo.png" style="height: 33px; width:33px; text-align: center; "></a>

</div>
  
<!-- container -->
<div class="container">
<div class="page-header">

</br>
</br>
</br>

<h1> Registros de outros usuários</h1>
</div>
<!-- PHP code to read records will be here -->
<?php
// include database connection
include "config/conexao.php";
// PAGINATION VARIABLES
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set records or rows of data per page
$records_per_page = 5;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;


// delete message prompt will be here
$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
// if it was redirected from delete.php
if($acao=='deleted'){
echo "<div class='alert alert-success'>Registro excluído.</div>";
}
// select data for current page
$query = "SELECT nome_usuario, nome_completo, endereco, telefone, email, senha, id FROM usuario ORDER BY id DESC
LIMIT :from_record_num, :records_per_page";

$stmt = $con->prepare($query);
$stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
$stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// this is how to get number of rows returned
$num = $stmt->rowCount();
// link to create record form
echo "<a href='cadastroUsuario.php' class='btn btn-primary m-b-1em'> Cadastro </a>";
//check if more than 0 record found
if($num>0){
// data from database will be here
//start table
echo "<table class='table table-hover table-responsive table-bordered'>";
//creating our table heading
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nome de usuario</th>";
echo "<th>Nome Completo</th>";
echo "<th>Telefone</th>";
echo "<th>Email</th>";
echo "<th>Endereço</th>";
echo "<th>Senha</th>";
echo "</tr>";
// table body will be here
// retrieve our table contents
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
// extract row
// this will make $row['firstname'] to just $firstname only
extract($row);
// creating new table row per record
echo "<tr>";
echo "<td>{$id}</td>";
echo "<td>{$nome_usuario}</td>";
echo "<td>{$nome_completo}</td>";
echo "<td>{$telefone}</td>";
echo "<td>{$email}</td>";
echo "<td>{$endereco}</td>";
echo "<td>{$senha}</td>";

echo "<td>";
// read one record

echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Ler</a>";

// we will use this links on next part of this post

echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Editar</a>";

// we will use this links on next part of this post

echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Excluir</a>";

echo "</td>";
echo "</tr>";
}
// end table
echo "</table>";


$query = "SELECT COUNT(*) as total_rows FROM usuario";
$stmt = $con->prepare($query);
// execute query
$stmt->execute();
//get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_rows = $row['total_rows'];
// paginate records
$page_url="index.php?";
include_once "paging.php";
}

// if no records found
else{
echo "<div class='alert alert-danger'>Registros não encontrados.</div>";
}
?>
</div> <!-- end .container -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- confirm delete record will be here -->
<script >
// confirm record deletion
function delete_user( id ){
var answer = confirm('Você tem certeza?');
if (answer){
// if user clicked ok,
// pass the id to delete.php and execute the delete query
window.location = 'delete.php?id=' + id;
}
}
</script>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>ResgatoCão</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="inicio.css">
    <link rel="icon" type="imagem/png" href=""/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="w3.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="cadastro.css">

</head>
<body>

	

<div class="topnav">

       <img src="img/logo2.jpeg" style="height: 60px; width: 170px; margin-left: 80px; margin-top: 27px;">
          

          <a href="encontrados.html"> Animais Encontrados </a>
          <a href="perdidos.html"> Animais Perdidos </a>
          <a href="inicio.html"> Sobre nós </a>
          <a href="login.html"><img src="img/usuariooo.png" style="height: 33px; width:33px; text-align: center; "></a>

</div>

	<div class="container">
	<div class="page-header">


<?php

if($_POST){
// include da conexao com o BD
include "config/conexao.php";
try{
// insert query
$query = "INSERT INTO usuario SET nome_usuario=:nome_usuario, nome_completo=:nome_completo, telefone=:telefone,
email=:email, endereco=:endereco, senha=:senha";

// prepare query for execution
$stmt = $con->prepare($query);
// posted values
$nome_usuario 			= htmlspecialchars(strip_tags($_POST['nome_usuario']));
$nome_completo 			= htmlspecialchars(strip_tags($_POST['nome_completo']));
$telefone				= htmlspecialchars(strip_tags($_POST['telefone']));
$email 					= htmlspecialchars(strip_tags($_POST['email']));
$endereco 				= htmlspecialchars(strip_tags($_POST['endereco']));
$senha					= htmlspecialchars(strip_tags($_POST['senha']));


// bind the parameters
$stmt->bindParam(':nome_usuario', $nome_usuario);
$stmt->bindParam(':nome_completo', $nome_completo);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':senha', $senha);


// specify when this record was inserted to the database
$data_criacao = date('Y-m-d H:i:s');
$stmt->bindParam(':data_criacao', $data_criacao);


// Execute the query
if($stmt->execute()){
echo "<div class='alert alert-success'>Registro foi salvo.</div>";
}else{
echo "<div class='alert alert-danger'>Não foi possível salvar o
registro.</div>";
}
}


// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
}
?>




<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<table class='table table-hover table-responsive table-bordered'>




    <div class="loginbox" style="width: 1250px; height: 800px; margin-top: 180px;">

    <h1 style="font-family: Montserrat; font-size: 30px;">Cadastro de Usuário</h1>

</br>
</br>
</br>

            
        <p>Nome de usuário</p>
        <input type="text" name="nome_usuario" placeholder="Digite seu nome de usuário" required="">
        <p>Nome Completo</p>
        <input type="text" name="nome_completo" placeholder="Digite seu nome completo" required="">
        <p>Telefone para contato</p>
        <input type="tel" name="telefone" placeholder="Formato: (xx) xxxxx-xxxx" required="">
        <p>E-mail</p>
        <input type="email" name="email" placeholder="@gmail.com" required="">
        <p>Endereço</p>
        <input type="text" name="endereco" placeholder="Digite seu nome de usuário" required="">
        <p>Senha</p>
        <input type="password" name="senha" placeholder="Digite sua senha" required=""> 
        

           
            <a href="login.html" style="font-size: 20px;">Já possui uma conta?</a>
            <br>           
            <br>


        <input type='submit' value='Cadastrar' class='btn btn-primary' style="width: 400px;height: 40px; margin-left: 160px; font-size: 18px; " />
        <a href='index.php' class='btn btn-danger' style="width: 350px; margin-top: -17px; height: 40px; font-size: 18px; "> Voltar </a>




    </form>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




  </div>
  </div>
    </div>





</body>
</html>
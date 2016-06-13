<?php
session_start();
include("conexao.php");
$pdo=conectar();
if(isset($_POST['entrar'])):
	$email = addslashes(trim($_POST['email']));
	$senha = addslashes(trim($_POST['senha']));
	
	
	if(!empty($email) AND !empty($senha)):
		
		$sql="SELECT * FROM perfil WHERE email =? AND senha = ? ";
		
		$verifica=$pdo->prepare($sql);
		$verifica->bindValue(1,$email);
		$verifica->bindValue(2,$senha);
		$verifica->execute();
		
		$dados=$verifica->fetch(PDO::FETCH_ASSOC);
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['id'] = $dados['id'];
		if($verifica->rowCount() ==1):
			$_SESSION['logado']=true;
			header("location:../index.php"); 
		else:
			echo "usuario ou senha incorretos";
		endif;
		
	endif;	
	
endif;


?>

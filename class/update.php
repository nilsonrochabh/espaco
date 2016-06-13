<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Espaço da Palavra</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../styles/plugins.css">
        <link rel="stylesheet" href="../styles/styles.css">

    </head>
<body>
<?php
include("conexao.php");
$pdo=conectar();
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../index.php");
    }
//verifica se exite os dados necessarios para a atualização 

if(!empty($_POST)){
	$nomeError=null;
	$fotoError=null;
	$emailError=null;
	$atuacaoError=null;
	$generoError=null;
	$senhaError=null;
	$confirmaSenhaError=null;
	$cepError=null;
	$cidadeError=null;
	$estadoError=null;
	$descricaoError=null;
	
	$nome = $_POST['name'];
	$foto=$_POST["foto"];
   $email=$_POST["email"];
   $atuacao=$_POST["atuacao"];
   $genero=$_POST["genero"];
   $senha=$_POST["senha"];
   $confirmaSenha=$_POST["confirmaSenha"];
   $cep=$_POST["cep"];
   $cidade=$_POST["cidade"];
   $estado=$_POST["estado"];
   $descricao=$_POST["descricao"];
   
    // validate input
        $valid = true;
        if (empty($nome)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
        
        $valid = true;
        if (empty($email)) {
            $emailError = 'Please enter Name';
            $valid = false;
        }
        $valid = true;
        if (empty($atuacao)) {
            $atuacaoError = 'Please enter Name';
            $valid = false;
        }
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE perfil  set nome = ?, email = ?, foto =?, atuacao=?,genero=?,senha=?,confirmaSenha=?,cep=?,cidade=?,estado=?,descricao=? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$email,$foto,$atuacao,$genero,$senha,$confirmaSenha,$cep,$cidade,$estado,$descricao,$id));
            Database::disconnect();
            header("Location: ../index.php");
        }
	}else
	{
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM perfil where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nome = $data['name'];
        $email = $data['email'];
        $foto = $data['foto'];
        $atuacao=$data["atuacao"];
		$genero=$data["genero"];
        $senha=$data["senha"];
        $confirmaSenha=$data["confirmaSenha"];
        $cep=$data["cep"];
        $cidade=$data["cidade"];
        $estado=$data["estado"];
        $descricao=$data["descricao"];
        
        Database::disconnect();
	}
  
?>


<header>
          <div class="container">
            <div class="logo login">
              <h1>
                <a href="../index.php"><img src="../img/espaco-da-palavra.svg" alt="Espaço da Palavra (Logo)" /></a>
              </h1>
            </div>

          </div>
        </header>
        <main class="login">
          <div class="container">
            <div class="col-full">
				
				
				<div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="nome" type="text"  placeholder="Nome" value="<?php echo !empty($nome)?$nome:'';?>">
                            <?php if (!empty($nomeError)): ?>
                                <span class="help-inline"><?php echo $nomeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($atuacao)?'error':'';?>">
                        <label class="control-label">Atuação</label>
                        <div class="controls">
                            <input name="atuacao" type="text"  placeholder="atuacao" value="<?php echo !empty($atuacao)?$atuacao:'';?>">
                            <?php if (!empty($generoError)): ?>
                                <span class="help-inline"><?php echo $atuacaoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                          <div class="control-group <?php echo !empty($genero)?'error':'';?>">
                        <label class="control-label">Genero</label>
                        <div class="controls">
                            <input name="atuacao" type="text"  placeholder="atuacao" value="<?php echo !empty($genero)?$genero:'';?>">
                            <?php if (!empty($generoError)): ?>
                                <span class="help-inline"><?php echo $generoError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        <div class="control-group <?php echo !empty($senha)?'error':'';?>">
                        <label class="control-label">Senha</label>
                        <div class="controls">
                            <input name="senha" type="text"  placeholder="senha" value="<?php echo !empty($senha)?$senha:'';?>">
                            <?php if (!empty($senhaError)): ?>
                                <span class="help-inline"><?php echo $senhaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                        <div class="control-group <?php echo !empty($confirmaSenha)?'error':'';?>">
                        <label class="control-label">Confirma Senha</label>
                        <div class="controls">
                            <input name="confirmaSenha" type="text"  placeholder="confirmaSenha" value="<?php echo !empty($confirmaSenha)?$confirmaSenha:'';?>">
                            <?php if (!empty($confirmaSenhaError)): ?>
                                <span class="help-inline"><?php echo $confirmaSenhaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                        <div class="control-group <?php echo !empty($cep)?'error':'';?>">
                        <label class="control-label">CEP:</label>
                        <div class="controls">
                            <input name="cep" type="text"  placeholder="cep" value="<?php echo !empty($cep)?$cep:'';?>">
                            <?php if (!empty($cepError)): ?>
                                <span class="help-inline"><?php echo $cepError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualiza</button>
                          <a class="btn" href="index.php">Voltar</a>
                        </div>
                    </form>
                </div>

        </main>

        <script src="../js/plugins.js"></script>
        <script src="../js/app.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-72765846-1', 'auto');
            ga('send', 'pageview');

        </script>
        <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
        <script>
          tinymce.init({
            selector: '#proposicao-conteudo',
            menubar:false,
            plugins: [
               "advlist autolink lists link image charmap print preview anchor",
               "searchreplace visualblocks code fullscreen",
               "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            automatic_uploads: true
          });
        </script>
</body>
</html>

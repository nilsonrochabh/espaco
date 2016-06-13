<?php
session_start();
include 'conexao.php';
	$pdo=conectar();
			//reealizando a consulta 
			$buscarUsuario= $pdo->prepare("SELECT * FROM perfil WHERE id=?" );
			$buscarUsuario->execute();

			//atribuindo os dados a variavel 
			$linha = $buscarUsuario->fetchAll(PDO::FETCH_ASSOC);

			//percorrendo a variavel para listar os dados
			foreach($linha as $listar){
					$nome="".$listar["nome"];
					$email="".$listar["email"];
					$atuacao="".$listar["atuacao"];
					$genero="".$listar["genero"];
					$cep="".$listar["cep"];
					$cidade="".$listar["cidade"];
					$estado="".$listar["estado"];
					$senha="".$listar["senha"];
					$confirmaSenha="".$listar["confirmaSenha"];
					$descricao="".$listar["descricao"];
					$id="".$listar["id"];
			}		
?>

<html>
	<head>
		 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Visualiza dados</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../styles/plugins.css">
        <link rel="stylesheet" href="../styles/styles.css">
	</head>
	<body>

			</body>
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
                        <h3>Dados</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Nome </label>
                        <div class="controls">
							<label><?php$listar["nome"];?></label>
                            
                               
                            
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            
                                <?php echo $data['email'];?>
                            
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Atuacao</label>
                        <div class="controls">
                         
                                <?php echo $data['atuacao'];?>
                            
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Genero</label>
                        <div class="controls">
                          
                                <?php echo $data['genero'];?>
                          
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Senha</label>
                      
                           
                                <?php echo $data['senha'];?>
                 
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Confirma Senha</label>
                        <div class="controls">
                           
                                <?php echo $data['confirmaSenha'];?>
                           
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">CEP</label>
                        <div class="controls">
                           
                                <?php echo $data['cep'];?>
                           
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Cidade</label>
                        <div class="controls">
                            
                                <?php echo $data['cidade'];?>
                            
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Estado</label>
                        <div class="controls">
                           
                                <?php echo $data['estado'];?>
                            
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Descricao</label>
                        <div class="controls">
                       
                                <?php echo $data['descricao'];?>
                           
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="../index.php">Voltar</a>
                       </div>
                     
                      
                    </div>
                </div>

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

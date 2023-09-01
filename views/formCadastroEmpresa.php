<?php 
    require_once "headerEmpresa.php";
    ?>
<html>
<body>

    <div class="container-fluid">         
        <div class="row">
            <div class="col col-lg-6" id="bkg-img">             
                <div class="container mt-5 ms-5" id="text-info">              
                    <h2>Texto sobre Cadastrar a empresa <em>INBEAUTY</em></h2>
                    <ul class="list mt-5">
                        <li>Cadastre seus serviços, profissionais</li>
                        <li>Encontre os clientes mais perto de você</li>                       
                        <li>Acesse a agenda do salão 24h para marcar seu horário</li>
                        <li>Receba lembredetes dos seus agendamentos</li>                       
                    </ul>   
                    <p>Preencha o formulário ao lado e cadastre sua empresa!</p>
                </div>  

            </div>
 


        


        <div class="col col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Cadastre-se sua empresa</h2>
                    </div>
                    
                    <div class="card-body"-->
                        <form action="#" method="post">
                        <div class="row">
                <!--Razão Social e Fantasia-->               
               
                           

             <!--Nome Fantasia  e Razao social-->               
                            <div class="col-6">
                            <label class="label" for="NomeFantasia">Nome Fantasia</label>
                            <input class="form-control" type="text" name="NomeFantasia"
                            value="<?php echo isset($_POST['NomeFantasia'])?$_POST['NomeFantasia']:''; ?>">
                            </div>


                        
                            <div class="col-6">                   
                                <label class="label" for="RazaoSocial">Razão Social</label>
                                <input class="form-control" type="text" name="RazaoSocial" 
                                value="<?php echo isset($_POST['RazaoSocial'])?$_POST['RazaoSocial']:''; ?>">
                            </div>

                            
							<div class="col-6 erro"><?php echo $msg[0] != ""?$msg[0]:""?></div>
							<div class="col-6"></div>

                            

                           <!--cnpj e logradouro --> 
					            
                    <div class="col-6 mt-3">
                                <label class="label" for="Cnpj">CNPJ</label>
                                <input class="form-control" type="text" name="Cnpj" 
                                value="<?php echo isset($_POST['Cnpj'])?$_POST['Cnpj']:''; ?>">
                            </div>


							
                        <div class="col-6 mt-3">                   
                        <label class="label" for="Logradouro">Logradouro</label>
                        <input class="form-control" type="text" name="Logradouro"
                        value="<?php echo isset($_POST['Logradouro'])?$_POST['Logradouro']:''; ?>">
                         </div>



						<div class="col-6 erro"><?php echo $msg[1] != ""?$msg[1]:""?></div>
						<div class="col-6 erro"><?php echo $msg[2] != ""?$msg[2]:""?></div>





              <!--Num  e Bairro-->

            	            
              <div class="col-6 mt-3">
                        <label class="label" for="Num">Num</label>
                        <input class="form-control" type="text" name="Num" 
                        value="<?php echo isset($_POST['Num'])?$_POST['Num']:''; ?>">
                        </div>


							
                        <div class="col-6 mt-3">                   
                        <label class="label" for="Bairro">Bairro</label>
                        <input class="form-control" type="text" name="Bairro"
                        value="<?php echo isset($_POST['Bairro'])?$_POST['Bairro']:''; ?>">
                         </div>



						<div class="col-6 erro"><?php echo $msg[3] != ""?$msg[3]:""?></div>
						<div class="col-6 erro"><?php echo $msg[4] != ""?$msg[4]:""?></div>


        
                <!--Cep  e  cidade-->
                 
                <div class="col-6 mt-3">
                        <label class="label" for="Cep">CEP</label>
                        <input class="form-control" type="text" name="Cep" 
                        value="<?php echo isset($_POST['Cep'])?$_POST['Cep']:''; ?>">
                        </div>


							
                        <div class="col-6 mt-3">                   
                        <label class="label" for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade"
                        value="<?php echo isset($_POST['cidade'])?$_POST['cidade']:''; ?>">
                         </div>



						<div class="col-6 erro"><?php echo $msg[5] != ""?$msg[5]:""?></div>
						<div class="col-6 erro"><?php echo $msg[6] != ""?$msg[6]:""?></div>




                 <!--UF   E   FONE-->

                <div class="col-6 mt-3">
                        <label class="label" for="Uf">Estado</label>
                        <input class="form-control" type="text" name="Uf" 
                        value="<?php echo isset($_POST['Uf'])?$_POST['Uf']:''; ?>">
                        </div>


							
                        <div class="col-6 mt-3">                   
                        <label class="label" for="Fone">Fone</label>
                        <input class="form-control" type="text" name="Fone"
                        value="<?php echo isset($_POST['Fone'])?$_POST['Fone']:''; ?>">
                         </div>



						<div class="col-6 erro"><?php echo $msg[7] != ""?$msg[7]:""?></div>
						<div class="col-6 erro"><?php echo $msg[8] != ""?$msg[8]:""?></div>



               <!--Email e Senha-->
               <div class="col-06 mt-3">
                    <label class="label" for="Email">E-mail</label>
                    <input class="form-control" type="email" name="Email"
                    value="<?php echo isset($_POST['Email'])?$_POST['Email']:''; ?>">
                            </div>

					<div class="col-12 erro"><?php echo $msg[9] != ""?$msg[9]:""?></div>


					<div class="col-6 mt-3">     
                    <label class="label" for="Senha">Senha</label>
                    <input class="form-control" type="password" name="Senha">
                            </div>
                <div class="col-6 mt-3">     
                <label class="label" for="Confsenha">Confirme a Senha</label>
                 <input class="form-control" type="password" name="Confsenha">
                            </div>

                <div class="col-6 erro"><?php echo $msg[10] != ""?$msg[10]:""?></div>
				<div class="col-6 erro"><?php echo $msg[11] != ""?$msg[11]:""?></div>
                <div class="col-12 mt-3">



            <button type="submit" class="btn btn-primary" name="action">Enviar</button>   
            <button type="reset" class="btn btn-danger">Cancelar</button>                                
                </div>                 
                
            </div>               
                 
            </form>
        </div>
    </div>
</div>
</body>
<?php 
require_once "footer.php";
?>


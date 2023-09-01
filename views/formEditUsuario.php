<?php 
    //formulario p/ editar conta usuario
    require_once "headerUsuario.php";
    if(!isset($_SESSION))
	    session_start();

?>
<style>
    .card{
    margin-top:80px;
    }
	p{
		font-size: 18px;
		font-weight:bold;
	}
	strong{
		color: #ed563b;
		font-size: 18px;
		font-weight: bold;
		font-style: italic;
	}
	

</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Mantenha seus dados sempre atualizados</h4>
            <span class="text-center" style="color:green"><?php echo $resp ?></span>                       
        </div>
        <div ></div>  
        <div class="card-body">
            <form action="#" method="post">
            <div class="row">
            <?php foreach($ret as $dado):?>               
            
                <!--Nome e Nome de usuário-->
                <input type="hidden" name="idUsuario" value="<?php echo $dado->idUsuario; ?>">              
                <div class="col-6">
                        <label class="label" for="nome">Nome Completo</label>
                        <input class="form-control" type="text" name="Nome" value="<?php echo $dado->Nome; ?>">
                </div>
                <div class="col-6">                   
                    <label class="label" for="Apelido">Nome do usuário</label>
                    <input class="form-control" type="text" name="Apelido" value="<?php echo $dado->Apelido; ?>">
                </div>
                <div class="col-6 erro"><?php echo $msg[0] != ""?$msg[0]:""?></div>
                <div class="col-6"></div>

                <!--CPF e Celular-->                
                <div class="col-6 mt-3">
                    <label class="label" for="Cpf">CPF</label>
                    <input class="form-control" type="text" name="Cpf" value="<?php echo $dado->Cpf; ?>">
                </div>
                
                <div class="col-6 mt-3">                   
                    <label class="label" for="Celular">Celular</label>
                    <input class="form-control" type="text" name="Celular" value="<?php echo $dado->Celular; ?>">
                </div>
                <div class="col-6 erro"><?php echo $msg[1] != ""?$msg[1]:""?></div>
                <div class="col-6 erro"><?php echo $msg[2] != ""?$msg[2]:""?></div>

                <!--Sexo e Data de Nascimento-->   
                <div class="col-6 mt-3">
                <label class="label" for="Sexo">Sexo</label>
                    <select class="form-select "  name="Sexo" id="sexo">
                        <option value=""><?php echo $dado->Sexo; ?></option>
                        <option value="feminino"> Feminino</option>
                        <option value="masculino"> Masculino</option>
                    </select>
                </div>
                <div class="col-6 mt-3">     
                    <label class="label" for="DataNascimento">Data de Nascimento</label>
                    <input class="form-control" type="date" name="DataNascimento" value="<?php echo $dado->DataNascimento; ?>">
                </div>  
                <div class="col-6 erro"><?php echo $msg[3] != ""?$msg[3]:""?></div>
                <div class="col-6 erro"><?php echo $msg[4] != ""?$msg[4]:""?></div>	                            
                
                <!--Email e Senha-->
                <div class="col-06 mt-3">
                        <label class="label" for="Email">E-mail</label>
                        <input class="form-control" type="email" name="Email" value="<?php echo $dado->Email; ?>">
                </div>
                <div class="col-6 mt-3">     
                  
                    <input class="form-control" type="hidden" name="Senha" value="<?php echo $dado->Senha; ?>">
                </div>
                               
            
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-success" name="action">Salvar Atualizações</button> 

                    <a class="btn btn-danger ms-5" href="index.php?controle=usuarioController&metodo=cancelaUsuario&id=<?php echo $dado->idUsuario;?>">Cancelar Conta</a>                
                    
                    <a class="btn btn-primary ms-5"href="index.php?controle=usuarioController&metodo=home">Voltar</a>

            <?php endforeach; ?>                    
                </div>                                               
            </div>              
            
            </form>
        </div>
    </div>
</div>


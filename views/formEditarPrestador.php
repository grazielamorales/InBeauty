<?php
    //formulário para editar cadastro do prestador
   
    require_once "headerPrestador.php";
    if(!isset($_SESSION)){
             session_start();            
                      
    }
   
    ?>
<html>
<body>

<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h2>Editar Conta</h2>
            <p>Mantenha seus dados sempre atualizados!</p>
             <strong class="text-success"> <?php echo $msgBD;?></strong>     
        </div>      
       
        <div class="card-body">
            <form action="#" method="post">
                <div class="row">
                <?php 
                    foreach($resp as $dado):
                ?>
                    <!--Pegar o idPrestador para alterar no bd-->
                    <input type="hidden" name='idPrestador' value="<?php echo $dado->idPrestador; ?>";?>
                    <!--Nome - DtNasc-->               
                    <div class="col-6">
                        <label class="label" for="Nome">Nome Completo </label>
                        <input class="form-control" type="text" name="Nome"
                            value="<?php echo $dado->Nome; ?>" required>
                    </div>                          
                    
                    <div class="col-6">
                        <label class="label" for="DtNasc">Data de Nascimento</label>
                        <input class="form-control" type="date" name="DtNasc" 
                        value="<?php echo $dado->DtNasc; ?>" required>
                    </div>  
                    <div class="col-6 erro">
                        <?php echo $msg[0] != ""?$msg[0]:""?>
                    </div>                                         
                    <div class="col-6 erro">
                        <?php echo $msg[1] != ""?$msg[1]:""?>
                    </div>           
                   
                    <!--Celular & Email-->              
                    <div class="col-6 mt-3">                   
                        <label class="label" for="Celular">Celular</label>
                        <input class="form-control" type="text" name="Celular" value=" <?php echo $dado->Celular; ?> " required> 
                    </div>            
                    <div class="col-6 mt-3">
                        <label class="label" for="Email">E-mail</label>
                        <input class="form-control" type="email" name="Email" value="<?php echo $dado->Email; ?>">
                    </div> 
                    <div class="col-6 erro">
                        <?php echo $msg[2] != ""?$msg[2]:""?>
                    </div>                    
                    <div class="col-6 erro">
                        <?php echo $msg[3] != ""?$msg[3]:""?>
                    </div>                 
         
                    <!--Senha-->    
                    <div class="col-6 mt-3">
                       
                        <input class="form-control" type="hidden" name="Senha" value="" required>
                    </div>  

                    <!--confirmando a situação-->
                    <input type="hidden" name="Situacao" value="<?php echo $dado->Situacao; ?>">

                    
                <?php endforeach;?>               
                </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-success" name="action">Salvar Alterações</button>   
                        <button type="reset" class="btn btn-danger ms-3">Cancelar</button> 

                        <a class="btn btn-primary ms-3"href="index.php?controle=prestadorController&metodo=home">Voltar</a>                      
                    </div>                                     
                </div>      
                <p class="text-center mt-5" style="color:dimgrey">Se necessário, altere os campos acima e click em Salvar! Digite a mesma senha ou uma nova e confirme! </p>
             </form>     
        </div>                              
    </div>                        
</div>                       
                                
                   
  
   
</body>


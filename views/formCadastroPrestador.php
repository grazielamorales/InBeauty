<?php 
    //formulário de cadastro de prestadores
    require_once "config.php";   
    ?>
<html>
<style>
    span{
        font-size: 12px;       
        color: red;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid ms-5">
            <a class="navbar-brand" href="index.php" id="logo">IN <em>BEAUTY</em></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>                        
        
        </div>
    </nav> 
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h2>Cadastro do Profissional</h2>
        </div>      
               
        <div class="card-body">
  <form action="#" method="post">
                <div class="row">
                    <!--Nome - DtNasc-->               
                    <div class="col-6">
                        <label class="label" for="Nome">Nome Completo </label>
                        <input class="form-control" type="text" name="Nome"
                            value="<?php echo isset($_POST['Nome'])?$_POST['Nome']:''; ?>">
                    </div>                          
                    
                    <div class="col-6">
                        <label class="label" for="DtNasc">Data de Nascimento</label>
                        <input class="form-control" type="date" name="DtNasc" 
                        value="<?php echo isset($_POST['DtNasc'])?$_POST['DtNasc']:''; ?>">
                    </div>  
                    <div class="col-6 erro">
                        <span><?php echo $msg[0] != ""?$msg[0]:""?></span>
                    </div>                                         
                    <div class="col-6 erro">
                        <span><?php echo $msg[1] != ""?$msg[1]:""?></span>
                    </div>           
                   
                    <!--Celular & Email-->              
                    <div class="col-6 mt-3">                   
                        <label class="label" for="Celular">Celular</label>
                        <input class="form-control" type="text" name="Celular" value="<?php echo isset($_POST['Celular'])?$_POST['Celular']:''; ?>">
                    </div>            
                    <div class="col-6 mt-3">
                        <label class="label" for="Email">E-mail</label>
                        <input class="form-control" type="email" name="Email" value="<?php echo isset($_POST['Email'])?$_POST['Email']:''; ?>">
                    </div> 
                    <div class="col-6 erro">
                        <span><?php echo $msg[2] != ""?$msg[2]:""?></span>
                    </div>                    
                    <div class="col-6 erro">
                        <span><?php echo $msg[3] != ""?$msg[3]:""?></span>
                    </div>                 
         
                    <!--Senha-->    
                    <div class="col-6 mt-3">
                        <label class="label" for="Senha">Senha</label>
                        <input class="form-control" type="password" name="Senha">
                    </div>                 

                    <div class="col-6 mt-3">     
                        <label class="label" for="Confsenha">Confirme a Senha</label>
                        <input class="form-control" type="password" name="Confsenha">
                    </div>
                    <div class="col-6 erro">
                        <span><?php echo $msg[4] != ""?$msg[4]:""?></span>
                    </div>                    
                    <div class="col-6 erro">
                        <span><?php echo $msg[5] != ""?$msg[5]:""?></span>
                    </div>                
                </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="action">Enviar</button>   
                        <button type="reset" class="btn btn-danger">Cancelar</button>                       
                    </div>                                     
                </div>      
                 <a class="mt-3 mb-3 ms-3" href="index.php?controle=usuarioController&metodo=login">Já tem conta? Clique aqui para entrar!</a>  
             </form>     
        </div>                              
    </div>                        
</div>                    
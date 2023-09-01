<?php   
    // form para o prestador adicionar um novo serviço p/ seu estabelecimento
    if(!isset($_SESSION))
		session_start();
    
    require_once "views/config.php";
    require_once "views/headerPrestador.php";

?>

<div class="container-sm">   

    <div class="row justify-content-md-center">
        <div class="col-6 md-auto mt-3 mb-3">
            <h2>Cadastro de Serviços  </h2>           
            <strong style="font-size:22px; color:#ed563b"><em><?php echo $_SESSION["Nome"]?></em> </strong>
            <p>Preencha o formulário para cadastrar um serviço</p>
            
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="card col-6 md-auto">        
            <form action="#" method="post">
                <div class="m-3">                    
                         
                </div>
                <div class="m-3">
                    <label class="control-label" for="descritivo">Descrição</label>
                    <input class="form-control" type="text" name="descritivo" value="" required>        
                </div>
                
                <div class="m-3">
                    <label class="control-label" for="preco">Preço R$</label>
                    <input class="form-control" type="text" name="preco" value="" required>        
                </div>
                <div class="m-3">
                    <label class="control-label" for="tempoEstimado">Tempo Estimado</label>
                    <input class="form-control" type="time" name="tempoEstimado" value=""
                    required>        
                </div>                   		

                <button class="btn btn-primary ms-3 mb-5">Salvar</button>
                <a class="btn btn-success ms-3 mb-5" href="index.php?controle=prestadorController&metodo=listarServicos&pagina=1&id="<?php echo $idPrestador?>>Voltar</a>
                
                <div class="m-3" style="color:green"> 
                    <?php echo "<em>".$resp."</em>";?>  
                </div> 
            </form>  
        </div>               
    </div>        
</div>
</body>




















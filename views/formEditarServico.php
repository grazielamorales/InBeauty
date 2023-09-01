<?php   
    //Formulario para Editar Serviço cadastrado no BD

    if(!isset($_SESSION))
		session_start();
    
    require_once "views/headerPrestador.php";

?>
<style>
        span{
            font-size:14px;
            color: #ed563b;

        }

</style>

<div class="container">   

    <div class="row justify-content-md-center">
        <div class="col-6 md-auto mt-3">
            <h2>Editar o Serviço </h2>           
            <strong style="font-size:22px; color:#ed563b"><em><?=$_SESSION["Nome"]?></em> </strong>
            <p>Se necessário, altere os campos do formulário abaixo e salvar!</p>
           
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="card col-6 md-auto">
            <?php foreach($ret as $dado):?>
                <form action="#" method="post">
                    <div class="m-3">                    
                        <input class="form-control" type="hidden" name="idServico" value="<?php echo $dado->idServico; ?>">
                    </div>
                    <div class="m-3">                    
                        <label class="control-label" for="descritivo">Descrição do Serviço</label>
                        <input class="form-control" type="text" name="descritivo" value="<?php echo $dado->descritivo?>">        
                    </div>
                    <div class="col-6 m-3">
                        <span><?php echo $msg[0] != ""?$msg[0]:""?></span>
                    </div>   
                    <div class="m-3">
                        <label class="control-label" for="preco">Preço R$</label>
                        <input class="form-control" type="text" name="preco" value="<?php echo number_format($dado->preco, 2, ',', '.') ?>">       
                    </div>
                    <div class="col-6 m-3">
                        <span><?php echo $msg[1] != ""?$msg[1]:""?></span>
                    </div>   
                    <div class="m-3">
                        <label class="control-label" for="tempoEstimado">Tempo Estimado</label>
                        <input class="form-control" type="time" name="tempoEstimado" value="<?php echo $dado->tempoEstimado ?>">        
                    </div>
                    <div class="col-6 m-3">
                        <span><?php echo $msg[2] != ""?$msg[2]:""?></span>
                    </div>   
            <?php endforeach; ?>                     
                                
                
                    <button class="btn btn-primary ms-3">Salvar</button>
                    <a class="btn btn-success ms-3 " href="index.php?controle=prestadorController&metodo=listarServicos&pagina=1">Voltar</a>
                </form>
                <div class="m-3" style="color:green"> 
                    <?php echo "<em>".$resp."</em>";?>  
                </div>   
            </div>                
        </div>
    </div>            
</div>










<?php 
    //pag p/ confirmar cancelaento do serviço pelo prestador
    require_once "views/headerPrestador.php";
    if(!isset($_SESSION))
	    session_start();

?>
<style>
   
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
    <div class="card mt-5" style="max-width: 45rem;" >
        <div class="card-header">
              <h2 class="card-title text-danger">Excluir Serviço</h5>   
        </div>
        <div class="card-body">
             <em>Tem certeza que deseja excluir esse serviço?</em>
        </div>  
        <form action="#" method="post">            
                <input type="hidden" name="idPrestador" value="<?=$_SESSION['idPrestador']?>">
                <input type="hidden" name="idServico" value="<?=$_GET["id"]?>">
            
            <div class="mt-3 mb-3 ms-3 me-3">
            <?php foreach($ret as $dado):?>
                <label  class="form-label" for="descritivo">Serviço</label>
                <input class="form-control" type="text" name="descritivo" value="<?=$dado->descritivo?>">
                
            </div>            

            <?php endforeach?>
           
           
        <div class="card-footer">
            <button class="btn btn-danger mt-3" type="submit">Excluir</button>

            <a class="btn btn-success mt-3" href="index.php?controle=prestadorController&metodo=listarServicos&pagina=1">Voltar</a>
        </div>               
          
        </form>
        <div class="text-success my-3 ms-3"> <?php echo $msg;?> </div>
    </div>   
   
</div>




<?php 
    require_once "views/headerUsuario.php";
    if(!isset($_SESSION))
	    session_start();

?>
<style>
    .card{
        margin-top: 80px;
       display: flex;
       justify-content: center;
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
    <div class="card" style="width: 25rem;">
         <form action="#" method="post">

            <div class="card-body">
                <h2 class="card-title text-danger">Cancelar Conta</h5>               
            </div>
            <div class="text-success my-3 ms-3"> <?php echo $msg;?> </div>
        </form>
        <a class="btn btn-success" href="index.php?controle=usuarioController&metodo=logout">Voltar</a>
    </div>

    
   
</div>




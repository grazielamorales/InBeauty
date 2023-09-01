<?php 
	//var_dump($prestador);
	//var_dump($servico);
	//die();
	require_once "headerUsuario.php";
    if(!isset($_SESSION))
		session_start();	

	date_default_timezone_set("America/Sao_Paulo");
?>

<style>
	.container{
		margin-top:150px;
		margin-bottom:280px;
	
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
	.input-padding-y{
		padding:0.5rem;
	}

</style>
<div class="container">
	<div class="card">
	
		<div class="card-header">
			<h2>Editar Reserva:</h2>	
			
		</div>
		<div class="card-body mt-3 mb-5">		
	
			<form action="#" method="post">	
					
				<?php foreach($retReserva as $dado):?>
					<input class="form-control mb-3" type="hidden" name="idReserva" value="<?php echo $dado->idReserva ?>">	
					<input class="form-control mb-3" type="hidden" name="idPrestador" value="<?php echo $dado->idPrestador ?>">
					<input class="form-control mb-3" type="text" name="Nome" value="<?php echo $dado->Nome ?>">
					<input class="form-control mb-3" type="text" name="Procedimento" value="<?php echo $dado->descritivo ?>">				
					<input class="form-control mt-3 mb-3" type="text"  name="Valor" value="<?php echo "R$" . number_format($dado->preco,2, ',', '.'); ?>">	

					<input class=" mt-3" type="date" min="<?php echo date('Y-m-d') ?>" name="DataReserva" value="<?php echo $dado->DataReserva ?>">
					<input class=" mt-3 mb-3" type="time"  name="HoraReserva" 
					value="<?php echo $dado->HoraReserva ?>"> 	
				<?php endforeach; ?>	
				
				

				<button type="submit" class="btn btn-primary mt-3 ms-5"> Salvar</button>
				<a href="index.php?controle=usuarioController&metodo=home" class="btn btn-success mt-3">Voltar</a>				
			</form>
		</div>
		<div class="col-6 ms-5 mb-5" style="color:#198754"><?php echo $msg;?></div>	
	</div>
</div>






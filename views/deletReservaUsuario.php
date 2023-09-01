<?php 
	require_once "headerUsuario.php";
    require_once "config.php";
    if(!isset($_SESSION))
		session_start();

?>
<style>
    .card-header{
        margin-top:85px;
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

    <div class="card-header">
        <div class="col md-auto">
            <h3><em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION['Apelido']?></em>, tem certeza que deseja cancelar a reserva? </h3>
           
        </div>
    </div>
    <div class="card-body justify-content-md-center">

        <table class="table table-striped table-bordered mb-3">
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Procedimento</th>
                <th>Valor</th>
                <th>Profissional</th>                
            </tr>

            <?php if(is_array($retorno)){
               
               foreach ($retorno as $dado) {
               echo "<tr>";
               echo "<td>" . date('d/m/Y', strtotime($dado->DataReserva)) . "</td>";            
               echo "<td>{$dado->HoraReserva}</td>";
               echo "<td>{$dado->descritivo}</td>";
               echo "<td> R$ " . number_format($dado->preco,2,",",".")."</td>";
               echo "<td>{$dado->Nome}</td>";         
                         
               echo "</tr>";
           }
       }
       
       ?>       

        </table>        
        <div class="card-footer d-flex justfy-content-between align-itens-center">
            <div class="m-3">
                <a class="btn btn-danger ms-5 mb-5" href="index.php?controle=reservaController&metodo=deletReserva&idReserva=<?php echo $dado->idReserva; ?>">Confirma</a>
            </div>
            <div class="m-3">
                <a class="btn btn-success mb-3" href="index.php?controle=usuarioController&metodo=home">Voltar</a>
            </div>            
        </div>
         <div class="col-6 mb-5" style="color:#198754"><?php echo $msg;?></div>       
    </div>
    
</div>
















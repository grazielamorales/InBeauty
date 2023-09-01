<?php 
	require_once "headerUsuario.php";

    if(!isset($_SESSION))
		session_start();
        

?>
<style>
   .col{
    margin-top: 80px;
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
    <div class="row justify-content-md-center">
        <div class="col md-auto">
            <h3>Bem vindo(a) a sua Agenda <em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION['Apelido']?></em> </h3>
            <p>Confira abaixo suas reservas:</p>
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-3">
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Procedimento</th>
                <th>Valor</th>
                <th>Profissional</th>    
                <th class="text-center">Excluir</th>
            </tr>

            <?php 
            if(is_array($retorno)){
               
               foreach ($retorno as $dado) {
                    echo "<tr>";
                    echo "<td>" . date('d/m/Y', strtotime($dado->DataReserva)) . "</td>";            
                    echo "<td>{$dado->HoraReserva}</td>";
                    echo "<td>{$dado->descritivo}</td>";
                    echo "<td> R$ " . number_format($dado->preco,2,",",".")."</td>";
                    echo "<td>{$dado->Nome}</td>";
                    
                    echo "<td class='text-center'>          
                            <a href='index.php?controle=reservaController&metodo=confirmaDeletReserva&idReserva=$dado->idReserva'>
                            <i class='fa-solid fa-eraser fa-2xl' style='color: #ed563b;'></i>
                            
                    </td>";                   
                    echo "</tr>";
                }          

            }
            if(empty($retorno)){ 
            
                $msg = "<strong> Você ainda não possui reserva. Volte e faça já sua reserva com seu profissional favorito!</strong>";
            }       
       
       ?>              
        </table>
        <div class="row justify-content-end">
            <div class="col-2">
            <a class="btn btn-success mb-3" href="index.php?controle=usuarioController&metodo=home">Voltar</a>
            </div>            
        </div>  
        <div class="col-6 ms-5 mb-5" style="color:#198754"><?php echo $msg;?></div>
              
    </div>  
    
</div>














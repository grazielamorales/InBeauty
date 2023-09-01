<?php 
    //agenda prestador
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
	.input-padding-y{
		padding:0.5rem;
	}

</style>

<div class="container">
    <div class="card mt-3">
       
        <div class="card-header">
            <h3>Sua Agenda <em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION['Nome']?></em> </h3>
            <p>Confira abaixo a lista de serviços agendados para você:</p>
             
        </div>      
        <div class="car-body">
            <table class="table table-striped table-bordered mb-3">
                <tr>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Procedimento</th>
                    <th>Valor</th>
                    <th>Cliente</th>
                    <th>Celular</th> 
                    <th class="text-center">Cancelar</th>                 
                </tr>

                <?php 
                    if(is_array($retorno)){
                    $id="";
                    foreach ($retorno as $dado) {
                        
                            echo "<tr>";
                            echo "<td>" . date('d/m/Y', strtotime($dado->DataReserva)) . "</td>";            
                            echo "<td>{$dado->HoraReserva}</td>";
                            echo "<td>{$dado->descritivo}</td>";
                            echo "<td> R$ " . number_format($dado->preco,2,",",".")."</td>"; 
                            echo "<td>{$dado->Nome}</td>";
                            echo "<td>{$dado->Celular}</td>"; 
                            echo "<td class='text-center' id='conf-Delet'>
                                <a class='btn btn-outline-dark'  href='index.php?controle=reservaController&metodo=confirmaDeletReserva&idReserva={$dado->idReserva}'> <i class='fa-solid fa-eraser fa-xl' style='color: #ed563b;'></i></button> </a>                  
                            
                                </td>";                                 
                            
                                                            
                        }                
                        echo "</tr>";      

                    }
                    if(empty($retorno)){ 
                
                    $msg = " Você ainda não possui serviços agendados!";
                }        
            
                ?>              
            </table>
        </div>
        <div class="card-footer ">           
            
            <div class="text-success  mb-3 mt-3">
                <em><?php echo $msg;?></em>
            </div>
            <div class=" mb-3 mt-3 justfy-content-end">
                <a class="btn btn-success" href="index.php?controle=prestadorController&metodo=home">Voltar</a>
            </div>
        </div>
       
              
    </div>         
   
</div>

</body>
<!--INICIO modal confirma delere reserva não esta implementado --->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    async function apagarReserva(id){  
    $id = document.getElementById('conf-Delet').value;
    alert (id);            
        swal ( {
            title : " Tem certeza? " , 
            text : " Uma vez excluído, você não poderá recuperar este arquivo! " , 
            icon : "warning" , 
            buttons : true , 
            dangerMode : true 
        } )
        .then ( async (willDelete) =>  { 
            if (willDelete) { 
                const dados = await fetch('index.php?controle=reservaController&metodo=deletReserva&idReserva=' + id);              
                
                swal ( " Pronto! Seu registro foi deletado com sucesso! " , { 
                    icon : "success"
                    
                } ) ;                        
                
            } else {  
                swal ( " Seu registro está seguro! " ) ;
            }
        } );
    }      
</script>















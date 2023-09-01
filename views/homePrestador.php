<?php     
    //página home do prestador
    require_once "headerPrestador.php";
    
    if(!isset($_SESSION))
		session_start();

?>

<div class="container-md mt-5">

    <div class="row">
        <div class="col-sm-10">
            <h3>Bem Vindo(a) <em style="color:#ed563b; font-weight:bold"><?php echo $_SESSION["Nome"]?></em> </h3>
            <br>
            <h4>Agendados para hoje!  </h4>
        </div>
    </div>    

    <table class="table table-striped table-bordered mb-5">
        <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Procedimento</th>
            <th>Cliente</th>
            <th>Celular</th> 
            <th class="text-center">Cancelar</th>              
            
        </tr>
        <tr>
        <?php
        if(is_array($retorno)) {
        
            foreach($retorno as $dado){
            echo "<td>" . date('d/m/Y', strtotime($dado->DataReserva)) . "</td>";            
            echo"<td>{$dado->HoraReserva}</td>";
            echo"<td>{$dado->descritivo}</td>";
            echo"<td>{$dado->Nome}</td>";
            echo"<td>{$dado->Celular}</td>";
            echo"<td class='text-center'>
                <a class='btn btn-outline-dark' onclick='apagarReserva(id)'  href='index.php?controle=reservaController&metodo=confirmaDeletReserva&idReserva={$dado->idReserva}'> <i class='fa-solid fa-eraser fa-xl' style='color: #ed563b;'></i></button> </a>    
            </td>
            </tr>";
            }
        }
        if(empty($retorno)){ 
        
            $msg = "Você ainda não possui serviços agendados para hoje!";
        }        
        ?>          
          
    </table>
    <div class="text-success ms-3"><span><?php echo $msg;?></span></div>  
</div>
</body>
















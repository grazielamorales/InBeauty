<?php 
    //formulario p/ escolher um serviço e criar reserva do usuario
    require_once "headerEmpresa.php";

    if(!isset($_SESSION))
		session_start();

?>

<div class="container-md">

    <div class="row justify-content-md-center">
        <div class="col md-auto mt-5">
            <h2>Bem Vindo <em><?php echo $usuario?></em> </h2>
            <p>Selecione o seu serviço:</p>
        </div>
    </div>
    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered mb-5">
            <tr>
                <th>Descritivo</th>
                <th>Preço</th>
                <th>Tempo estimado</th>
                <th>Profissional</th>
                <th class="text-center">Agendar</th>
            </tr>
            <?php if(is_array($retorno)){
               
                    foreach ($retorno as $dado) {
                    echo "<tr>";
                    echo "<td>{$dado->descritivo}</td>";
                    echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                    echo "<td>{$dado->tempoEstimado}</td>";
                    echo "<td>{$dado->Profissional}</td>";
                    echo "<td class='text-center'>          
    						<a href='index.php?controle=servicoController&metodo=inserir'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>			
							
                    </td>";                   
                    echo "</tr>";
                }
            }
            
            ?>    

        </table>
       
    </div>
</div>


<?php 
    require_once "footer.php";
?>








<?php 
//página home cliente
   require_once "headerUsuario.php";  

    if(!isset($_SESSION))
		session_start();   
    
?>
<style>
    .card-header{
        margin-top:80px;
    }
</style>

<div class="container">

    <div class="card-header">
        <div class="col-4">
            <h3><em style="color:#ed563b; font-weight:bold">
                <?= $_SESSION["Apelido"] ?></em>
            </h3>
            <p>Escolha o profissional que deseja:</p>
        </div>    
        
    </div>

    <div class="card-body">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Profissional</th>                    
                    <th class="text-center">Agendar</th>
                </tr>
            </thead>
            <tbody>

             <?php foreach($ret as $dado):?>                    
                <tr>
                    <td><?=$dado->Nome?></td>                 
                    <td class='text-center'>          
                        <a href='index.php?controle=reservaController&metodo=agendar&idServico=<?=$id?>&idPrestador=<?=$dado->idPrestador?>'><i class='fa-solid fa-calendar-plus fa-2xl' style='color: #ed563b; '></i></a>                                   
                    </td>                   
                </tr>
            <?php endforeach; ?>                
            </tbody>
        </table>       
    </div>
    
</div>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener('keydown', function(event){
        if(event.key === "Enter")
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'index.php?controle=usuarioController&metodo=pesquisar&search='+search.value;
    }
</script>
</body>




















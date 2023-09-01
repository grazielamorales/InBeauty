<?php 
//página home cliente
   require_once "headerUsuario.php";  

    if(!isset($_SESSION))
		session_start();   
    
?>
<style>
    .row{
        margin-top:80px;
    }
</style>

<div class="container">

    <div class="row">
        <div class="col-4">
                <h3>Bem Vindo <em style="color:#ed563b; font-weight:bold">
                    <?= $_SESSION["Apelido"] ?></em>
                </h3>
            <p>Selecione o serviço que deseja agendar:</p>
        </div>   
        
    </div>

    <div class="card justify-content-md-center">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Procedimento</th>
                    <th>Preço</th>
                    <th>Tempo estimado</th>
                    <th class="text-center">Buscar Profissional</th>                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    
                    if(is_array($retorno))
                    {                
                        foreach ($retorno as $dado) 
                        {
                            echo "<tr>";
                            echo "<td>{$dado->descritivo}</td>";
                            echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                            echo "<td>{$dado->tempoEstimado}</td>";
                            echo "<td class='text-center'>
                                    <a href='index.php?controle=usuarioController&metodo=listPrestador&id=$dado->idServico'>
                                    <i class='fa-solid fa-magnifying-glass fa-xl' style='color: #ed563b;'></i></a>
                                </td>";
                                        
                            echo "</tr>";
                        }
                    }                    
                    
                ?>     
                
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




















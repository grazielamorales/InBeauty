<?php 
    //página Lista de Serviços cadastrados p/ o prestador logado
    require_once "headerPrestador.php";
    require_once "config.php";

    if(!isset($_SESSION))
		session_start();
     
?>

<div class="container mt-3">   
    <div class="card">
        <div class="card-header">
              <h3>Lista de Serviços Cadastrados</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">          
                <tr>
                    <th>Procedimento</th>
                    <th>Preço R$</th>
                    <th>Tempo estimado</th>     
                    <th class="text-center">Editar</th>
                    <th class="text-center">Apagar</th>
                </tr>           
                <?php if(is_array($retorno))
                {                
                    foreach ($retorno as $dado) {                    
                        echo "<tr>";
                        echo "<td>{$dado->descritivo}</td>";
                        echo "<td>" . number_format($dado->preco,2,",",".")."</td>";
                        echo "<td>{$dado->tempoEstimado}</td>";                   
                        
                        //botões CRUD                    
                        echo "<td class='text-center'>          
                                <a class='btn btn-outline-dark' href='index.php?controle=servicoController&metodo=Editar&idServico=$dado->idServico'><i class='fa-solid fa-pen fa-xl' style='color: #ed563b;'></i></a></td>"; 
                        echo "<td class='text-center'id='conf-delet'>          
                                <a id='$dado->idServico' class='btn btn-outline-dark' href='index.php?controle=servicoController&metodo=confirmaCancelaServico&id={$dado->idServico}&idPrestador={$_SESSION['idPrestador']}'><i class='fa-sharp fa-solid fa-eraser fa-xl' style='color: #ed563b;'></i></a></td>"; 						
                                        
                        echo "</tr>";
                    }
                }            
                if(empty($retorno)){ 

                    $msg = "Você ainda não possui serviços cadastrados. Começa agora a cadastrar seus serviços!" ;
                    $pagina=1;
                }                        
            
                echo "<div class='col-lg-12 d-flex justify-content-between align-items-center'> ";
                echo"<div class='mb-3' >
                        <a class='btn btn-dark' href='index.php?controle=servicoController&metodo=Adicionar&idPrestador=$idPrestador'><i class='fa-solid fa-file-circle-plus 'style='color: #ed563b;'></i> Adicionar Serviço</a>
                    </div>";             
                    
                ?> 
                <div>
                    <a class="btn btn-success mb-3" href="index.php?controle=prestadorController&metodo=home">VOLTAR</a>
                </div>           
            </table>        
        </div>
        <div class="m-3">
                    <span><?=$resp; ?></span>
        </div>

    </div>    
</div>
 <!--INICIO método para paginação-->
    <?php
        
        $pagina = $_GET['pagina'];  // echo $pagina;     
        $num_reg = count($result); //echo $num_reg;
        $qtdResultPag = 4; 
        $num_pag = ceil($num_reg / $qtdResultPag); //echo $num_pag;  
        //verificar a pag anterior
        $pag_ant = $pagina -1; 
        $pag_pos = $pagina +1;          
      
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-3">
        <?php 
        if($pag_ant != 0){?>
            <li class="page-item">
                <a class="page-link" href="index.php?controle=prestadorController&metodo=listarServicos&id=3&pagina=<?php echo $pag_ant; ?>" class="page-link" tabindex="-1" aria-disabled="true">Anterior</a>                
                
            </li>
        <?php } else{ ?>
               

        <?php } ?>    

            <?php 
            //Apresentar a paginação
            for($pag = 1; $pag < $num_pag +1; $pag++){?>
                
                <li class='page-item'><a class='page-link' href="index.php?controle=prestadorController&metodo=listarServicos&id=3&pagina=<?php echo $pag; ?>"><?php echo $pag; ?></a>
                </li>
                
            <?php }?>         
        <?php 
        if($pag_ant <= $num_pag){?>
            <li class="page-item">
                <a class="page-link" href="index.php?controle=prestadorController&metodo=listarServicos&id=3&pagina=<?php echo $pag_pos; ?>">Próximo</a>
            </li>
        <?php } else{ ?>
              
        <?php } ?>  
        </ul>
    </nav>    
</div>
<!--INICIO para modal confirma delet serviço-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    async function apagarServ(id){ 
        swal ( {
            title :" Tem certeza? " , 
            text : " Uma vez excluído, você não poderá recuperar este arquivo! " , 
            icon : "warning" , 
            buttons : true , 
            dangerMode : true 
        } )
        .then ( async (willDelete) =>  { 
            if (willDelete) { 
                const dados = await fetch('index.php?controle=prestadorController&metodo=deletServico&id=' + id); 
                await dados.json();
                
                swal ( " Pronto! Seu registro foi deletado com sucesso! " , { 
                    icon : "success"
                    
                } ) ;                        
                
            } else {  
                swal ( " Seu registro está seguro! " ) ;
            }
        } );
    }      
</script>
















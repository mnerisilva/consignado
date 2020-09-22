<?php

// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>

<section class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h3 class="light"> Propostas </h3>
            <hr>
                <table class="table table-responsive table-striped lista-propostas">
                    <thead>
                        <tr>
                            <th>Cod:</th>
                            <th>Nome:</th>
                            <th class="th-cpf">Cpf:</th>
                            <!--<th>xxx:</th>
                            <th>xxx:</th>-->
                            <th>Ade:</th>
                            <th>Par[R$]:</th>
                            <th>Sit:</th>
                            <th>Mot:</th>
                            <th>Org:</th>                            
                            <th>Bco:</th>
                            <th><i style="border: solid #fff 1px;" class="fas fa-folder-open"></i> Anexos:</th>
                            <!--<th>xxx:</th>
                            <th>xxx:</th>
                            <th>xxx:</th>-->
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        //$sql = "SELECT * FROM tab_clientes";
                        $sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.bccompra_contrato, P.situa_contrato, P.id_orgao FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli";
                        /*$sql = "SELECT C.id_cli, C.nome_cli, C.cpf_cli, P.id_contrato, P.ade_contrato, P.parce_contrato, P.bccompra_contrato, P.situa_contrato, P.id_orgao, A.file_name_anexo, A.path_anexo FROM tab_propostas AS P INNER JOIN tab_clientes AS C ON P.id_cli = C.id_cli INNER JOIN tab_anexos AS A ON P.id_contrato = A.id_contrato";*/
                        
                        $resultado = mysqli_query($connect, $sql);
                        
                        

                        if(mysqli_num_rows($resultado) > 0):

                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                        <tr>
                            <?php echo '<td class="color-'. $dados['situa_contrato'] . ' cod-cliente">'; ?>
                            <?php echo $dados['id_cli'].'</td>'; ?>
                            <td class="td-nome"><?php echo $dados['nome_cli']; ?></td>
                            <td class="td-cpf"><?php echo $dados['cpf_cli']; ?></td>
                            <!--<td></td>
                            <td></td>-->
                            <td class="td-ade"><?php echo $dados['ade_contrato']; ?></td>
                            <td class="td-parce"><span class="span-parce"><?php echo "R$ " . number_format($dados['parce_contrato'],2,",","."); ?></span></td>
                            <td class="td-situa">
                                <?php                                
                                   // busca descrição da situação na tabela situação
                                    $id_situacao = $dados['situa_contrato'];
                                    $sql3 = "SELECT id_situacao, descricao_situacao, motivo_descricao_situacao FROM tab_situacao WHERE ".$id_situacao." = id_situacao";
                                    $resultado3 = mysqli_query($connect, $sql3);
                                    $texto_id_situa = '';
                                    $texto_motivo_situa = '';
                                    while($dados3 = mysqli_fetch_array($resultado3)):
                                        $texto_id_situa     = $dados3['descricao_situacao'];
                                        $texto_motivo_situa = $dados3['motivo_descricao_situacao'];
                                    endwhile;  
                                
                                ?>
                                <?php echo '<i class="fas fa-grip-horizontal"></i><span class="span-situa-1">&nbsp;</span>';?>
                                <?php echo $texto_id_situa; ?></td>
                            <td class="td-motivo-situa"><?php echo $texto_motivo_situa; ?></td>
                            <td class="td-orgao"><?php echo $dados['id_orgao']; ?></td>
                            <td class="td-bccompra"><?php echo $dados['bccompra_contrato']; ?></td>
                            <td>
                                <?php 
                                    // lista tabela de anexos para montar os ícones na respectiva coluna
                                    $id_contrato = $dados['id_contrato'];
                                    $sql2 = "SELECT id_contrato, file_name_anexo, path_anexo FROM tab_anexos WHERE ".$id_contrato." = id_contrato";
                                    $resultado2 = mysqli_query($connect, $sql2);
                                    $tem_anexo = false; // variável flag definida para determinas a exibição ou não do ícone "clips de papel" na coluna/linha, da proposta do contexto... "true" = com anexo, 'false' = sem anexo
                                    while($dados2 = mysqli_fetch_array($resultado2)):
                                        if($dados2['file_name_anexo'] <> '') {
                                            $tem_anexo = true;
                                            $array_file_name = explode('.', $dados2['file_name_anexo']);
                                            $file_name = $array_file_name[0];
                                            $extensao_file = $array_file_name[1];
                                            $tipo_icone_anexo = $array_file_name[1];
                                            if($extensao_file == 'jpg' || $extensao_file == 'jpeg'){$tipo_icone_anexo = 'image';}
                                            //echo $dados2['file_name_anexo'];                                            
                                            echo '<a class="color-icon-'.$extensao_file.' anexo" download href="'.$dados2["path_anexo"].'/'.$file_name.'.'.$extensao_file.'" id="'.$file_name.'" title="'.$file_name.'.'.$extensao_file.'"><i class="far fa-file-'.$tipo_icone_anexo.'"></i></a>';                                            
                                        }
                                    endwhile;                                     
                                ?>
                            </td>
                            <!--<td></td>
                            <td></td>
                            <td></td>
                            <td></td>-->
                            <td><td>
                                <!-- Mostra o ícone 'clips de papel' (anexos) na lista de propostas, somente quando houver pelo menos um documento anexo -->
                                <?php
                                    if($tem_anexo){
                                        echo '<i class="fas fa-paperclip edit-btn" data-toggle="modal" data-target="#modalAnexos" data-id="'.$dados['id_contrato'].'"></i>';                                       
                                    }
                                 ?>
                                <!-- --------------------------------------------------------------------------------------------------------------------- -->
                            </td>
                            
                            <td><a href="editar.php?id=<?php echo $dados['id_cli']; ?>" class="btn-floating orange"><i class="fas fa-edit"></i></a></td>

                            <td><a href="#modal<?php echo $dados['id_cli']; ?>" class="btn-floating red modal-trigger"><i class="fas fa-trash"></i></a></td>

                            <!-- Modal Structure -->
                              <div id="modal<?php echo $dados['id_cli']; ?>" class="modal">
                                <div class="modal-content">
                                  <h4>Opa!</h4>
                                  <p>Tem certeza que deseja excluir esse cliente?</p>
                                </div>
                                <div class="modal-footer">					     

                                  <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id_cli']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                                     <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

                                  </form>

                                </div>
                              </div>


                        </tr>
                       <?php 
                        endwhile;
                        else: ?>

                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>

                       <?php 
                        endif;
                       ?>

                    </tbody>
                </table>
            <br>
            <hr>
            <a href="adicionar_cliente.php" class="btn btn-success">Adicionar cliente</a>          
            <a href="adicionar_proposta.php" class="btn btn-success">Adicionar proposta</a>          
        </div>
    </div>
       <!-- Modal anexo  -->    
       <div class="modal fade" id="modalAnexos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">  
            <div class="modal-dialog" role="document">  
              <div class="modal-content">  
                  <div class="modal-header">  
                     <h2 class="modal-title" id="exampleModalLabel"><strong>Lista de anexos</strong></h2>  
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                      <span aria-hidden="true">×</span>  
                     </button>  
                  </div>  
                  <div id="editForm">   
                  </div>  
                <div class='modal-footer'> 
                        <form method="post" id="upload_form" enctype='multipart/form-data'>
                            <p>Select Image</p>
                         <p><input type="file" name="upload_file" /></p>
                         <br />
                         <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                         <p><input type="submit" name="upload_button" class="btn btn-success" value="Upload" /></p>
                        </form>
                     <!--<span class='btn btn-success'><i class='fas fa-plus-circle' style='font-size: 3em;'></i></span>-->  
                     <button type='button' class='btn btn-secondary' data-dismiss='modal' style="font-size: 2.1em;">Close</button>                
                </div>   
              </div> 
          </div>  
       </div> 
    
   
    

    
</section>




<?php
// Footer
include_once 'includes/footer.php';
?>


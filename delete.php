 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['idAnexo'])) {  
           $idAnexo = $_POST['idAnexo'];
           $idContrato = $_POST['idContrato'];
           $pathAnexo = $_POST['pathAnexo'];
           $fileNameAnexo = $_POST['fileNameAnexo'];
           $caminho_e_nome_do_arquivo = $pathAnexo.'/'.$fileNameAnexo;
      }


      /*var_dump($_POST);
      die();*/


        // sql to delete a record
        $sql = "DELETE FROM tab_anexos WHERE id_anexo = {$idAnexo}";

        if (mysqli_query($connect, $sql)) {
            //unlink($_POST["path"]);
            unlink($caminho_e_nome_do_arquivo);
          //echo "Record deleted successfully";
        } else {
          echo "Error deleting record: " . mysqli_error($connect);
        }




      // fetch data from student table..
      $sql2 = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo FROM tab_anexos WHERE id_contrato = {$idContrato}";

      $resultado = mysqli_query($connect, $sql2);

      $output = "";  


      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados = mysqli_fetch_array($resultado)){
      $output .= "
                        <tr>
                            <td>".$dados['id_contrato']."</td>
                            <td><a href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK'>".$dados['file_name_anexo']."</a></td>
                            <td><i class='fas fa-trash' data-id_contrato=".$dados['id_contrato']." data-id_anexo=".$dados['id_anexo']." data-path_anexo=".$dados['path_anexo']." data-file_name_anexo=".$dados['file_name_anexo']."></i></td>                            
                        </tr>";
        }  
      }  
      echo "  
            <div class='modal-body'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Contrato</th>
                            <th>Arquivo</th>
                            <th></th>
                    </thead>
                    <tbody>".$output."
                    </tbody>
                </table>
            </div>  
            <div class='modal-footer'>  
                 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>  
                 <button type='button' class='btn btn-info' id='editSubmit'>Save changes</button>  
            </div>"; 
 ?>
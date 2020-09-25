 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 


      
      if (isset($_POST['idAnexo'])) {  
           $idAnexo = $_POST['idAnexo'];
           $idContrato = $_POST['idContrato'];
           $pathAnexo = $_POST['pathAnexo'];
           $fileNameAnexo = $_POST['fileNameAnexo'];
           $caminho_e_nome_do_arquivo = $pathAnexo.$fileNameAnexo;
      }


      //echo '<pre>'.var_dump($_POST).'</pre>';
      //echo '$caminho_e_nome_do_arquivo: ' . $caminho_e_nome_do_arquivo;
      echo '<br>$fileNameAnexo: ' . $fileNameAnexo;
      //echo '<br>$pathAnexo: ' . $pathAnexo;
      //die();


        // sql to delete a record
        $sql = "DELETE FROM tab_anexos WHERE id_anexo = {$idAnexo}";

        if (mysqli_query($connect, $sql)) {
            unlink($fileNameAnexo);
        } else {
          echo "Error deleting record: " . mysqli_error($connect);
        }




 ?>
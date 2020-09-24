 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      //var_dump($_POST); 
      //die();
      
      if (isset($_POST['id_contrato'])) {  
           $id_contrato = $_POST['id_contrato'];  
      }  
      // fetch data from student table..
      $sql = "SELECT id_contrato, id_anexo, path_anexo, file_name_anexo FROM tab_anexos WHERE id_contrato = {$id_contrato}";

      $resultado = mysqli_query($connect, $sql);

      $output = "";  

      //var_dump($_POST);
      //die();

      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados = mysqli_fetch_array($resultado)){
      $nome_do_arquivo_a_deletar = "'".$dados['file_name_anexo']."'";
      $nome_do_arquivo_a_deletar = str_replace("'", "", $nome_do_arquivo_a_deletar);
      $output .= "
                        <tr>
                            <td>".$dados['id_contrato']."</td>
                            <td><a href='".$dados['path_anexo']."/".$dados['file_name_anexo']."' target='_BLANK'>".$dados['file_name_anexo']."</a></td>
                            <td><i class='fas fa-trash' data-id_contrato=".$dados['id_contrato']." data-id_anexo=".$dados['id_anexo']." data-path_anexo=".$dados['path_anexo']." data-file_name_anexo=".$nome_do_arquivo_a_deletar."></i></td>                            
                        </tr>";
        }  
      }  
      echo $output; 
 ?> 
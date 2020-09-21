 <?php  
      // create database connectivity  
      require_once('php_action/db_connect.php'); 

      //var_dump($_POST);
      //die();
      
      if (isset($_POST['action'])) {  
           $action = $_POST['action'];  
      }  
      // fetch data from student table..
      $sql = "SELECT id_cli, cpf_cli, nome_cli FROM tab_clientes ORDER BY nome_cli";

      $resultado = mysqli_query($connect, $sql);

      $output = "";  

      //var_dump($_POST);
      //die();

      //if ($query->num_rows > 0) {
      if(mysqli_num_rows($resultado) > 0){
      //while ($row = $query->fetch_assoc()) {
      while($dados = mysqli_fetch_array($resultado)){
            $output .= "<option value=".$dados['id_cli']."><div><span>".$dados['cpf_cli']."</span>&nbsp;&nbsp;&equiv;&nbsp;&nbsp;<span><i class='fas fa-grip-horizontal'></i>".$dados['nome_cli']."</span></div></option>";
        }  
      }  
      echo "<option value=''>...</option>".$output; 
 ?> 
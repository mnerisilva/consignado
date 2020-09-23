<?php
    
    // Conexão
    include_once 'php_action/db_connect.php';

    if(!is_dir('uploads/50/')){ 
	   echo 'Pasta "uploads/50/" nao existe';
       mkdir('uploads/50/');
       echo 'Pasta "uploads/50/" criada com sucesso!';
    }
         die();
         
    if($_FILES["upload_file"]["name"] != '') {
         $data = explode(".", $_FILES["upload_file"]["name"]);
         $extension = $data[1];
         $allowed_extension = array("jpg","pdf", "png", "gif", "doc", "docx", "jpeg", "txt");
         $id_tipo_de_arquivo = (int) array_search($extension, $allowed_extension)+1;
                 
         //var_dump($_POST);        
         //var_dump($_FILES);
         //echo '$id_da_extensao: ' . $id_da_extensao;
         //die();
        
             if(in_array($extension, $allowed_extension)) {
                $new_file_name = rand() . '.' . $extension;
                $path = $_POST["hidden_folder_name"] . $_FILES["upload_file"]["name"];
                 
        
                //echo 'new_file_name: ' . $new_file_name . '<br>';
                //echo 'path: ' . $path . '<br>';
                 
         //var_dump($_POST);        
         //var_dump($_FILES);
         //die();
                 
                  if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path)) {
                    echo 'Arquivo anexado!';

                        $idContrato = $_POST['id_contrato_anexo'];
                        $idTipoDeArquivo = $id_tipo_de_arquivo;
                        $fileNameAnexo = $_FILES["upload_file"]["name"];
                        $pathAnexo = $_POST["hidden_folder_name"];
                        $dateuploadAnexo = '2020-1-1';
                        $sql = "INSERT INTO tab_anexos (id_contrato, id_tipo_arquivo, file_name_anexo, path_anexo, dateupload_anexo) VALUES ('$idContrato', '$idTipoDeArquivo', '$fileNameAnexo', '$pathAnexo', '$dateuploadAnexo')";

                        if(mysqli_query($connect, $sql)) {
                            echo 'Anexo incluído com sucesso!';
                        } else {
                            echo 'Ocorreu um erro!';
                        }
                      
                    
                  } else {
                    echo 'Ocorreu algum erro!';
                  }
             } else {
                echo 'Tipo de arquivo não permitido!';
             }
    } else {
        echo 'Por favor, selecione um arquivo!';
    }
?>
<?php
    if($_FILES["upload_file"]["name"] != '') {
         //var_dump($_FILES);
         //die();
         $data = explode(".", $_FILES["upload_file"]["name"]);
         $extension = $data[1];
         $allowed_extension = array("jpg", "png", "gif","pdf", "doc", "docx", "jpeg", "txt");
             if(in_array($extension, $allowed_extension)) {
                $new_file_name = rand() . '.' . $extension;
                $path = $_POST["hidden_folder_name"] . '/' . $new_file_name;
                  if(move_uploaded_file($_FILES["upload_file"]["tmp_name"], $path))
                  {
                   echo 'Arquivo anexado!';
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
      <!--JavaScript at end of body for optimized loading-->
      <!-- Latest compiled and minified JavaScript -->
      <!-- Latest compiled and minified JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="js/jquery.mask.min.js"></script>


      <script>
      	 //M.AutoInit();
          
          (function(){
       
              
          })();
      </script>
      
    </body>
  </html>  
 <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->  
 <script type="text/javascript">  
      $(document).ready(function(){ 
              console.log('teste');
              $('#cpf').mask('000.000.000-00', {reverse: true});
              $('#cep').mask('00000-000');
              $('#datanasc').mask('00/00/0000');
              $('#datacad').mask('00/00/0000');
              $('#parce').mask('#.##0,00', {reverse: true});
              $('#parceini').mask('#.##0,00', {reverse: true});
              $('#parcefinal').mask('#.##0,00', {reverse: true});
              $('#ml').mask('#.##0,00', {reverse: true});


            //console.log('entrou na function javascript');
            //var id = $('input[name=orgao]').val();
            /*$.ajax({ // ajax
                type: "GET",
                url: "carrega_select.php?cli=cli",
                success: function(result) {*/
                    //result = JSON.parse(result);
                    //console.log(result);

                    /*if(result.success) {
                        for (var i = 0; i < result.produtos.length; i++) {
                            $('select').append('<option value="' + result.produtos[i].id + '">' + result.produtos[i].nome + "</option>");
                        }
                    } else {
                        $('p').text('nao encontrado');
                    }*/

                //}
            //});          
          
          
           // Edit record to mysqli from php using jquery ajax  
           $(document).on("click",".edit-btn",function(){ 
               console.log('clicou no .edit-btn');
                var id = $(this).data('id');
                var id_contrato = $(this).data('id_contrato');
                $.ajax({  
                     url :"fetch.php",  
                     type:"POST",  
                     cache:false,  
                     data:{editId:id},  
                     success:function(data){  
                          $("#editForm").html(data);
                          //$(document).find('#upload_form').find('#hidden_folder_name').attr('values','uploads/'+id_contrato);
                         $('#hidden_folder_name').val('uploads/'+id+'/').trigger('change');
                         $('#id_contrato_anexo').val(id).trigger('change');
                         console.log($('#hidden_folder_name').attr('value')); 
                     },  
                });  
           });  
           // Delete record to mysqli from php using jquery ajax  
           $(document).on("click",".fa-trash",function(){ 
                var id_anexo = $(this).data('id_anexo');
                var id_contrato = $(this).data('id_contrato');
                var path_anexo = $(this).data('path_anexo');
                var file_name_anexo = $(this).data('file_name_anexo');
                console.log('clicou no .fa-trash = ' + id_anexo);
                console.log('clicou no .fa-trash = ' + id_contrato);
                //return false;
                $.ajax({  
                     url :"delete.php",  
                     type:"POST",  
                     cache:false,  
                     data:{idAnexo:id_anexo, idContrato:id_contrato, pathAnexo:path_anexo, fileNameAnexo:file_name_anexo},  
                     success:function(data){  
                          $("#editForm").html(data);
                          var split_file_name_anexo = file_name_anexo.split('.');
                          var file_name_anexo_sem_extensao = split_file_name_anexo[0];
                          console.log('file_name_anexo: '+ file_name_anexo);
                          console.log('.split'+file_name_anexo.split('.', file_name_anexo));
                          console.log('file_name_anexo_sem_extensao: '+ file_name_anexo_sem_extensao);
                          $('#'+file_name_anexo_sem_extensao).find('i').remove();
                     },  
                });  
           }); 
           // User record update to mysqli from php using jquery ajax  
           $(document).on("click","#editSubmit", function(){  
                var edit_id = $("#editId").val();  
                var name = $("#editName").val();  
                var email = $("#editEmail").val();  
                var password = $("#editPassword").val();  
                $.ajax({  
                     url:"update.php",  
                     type:"POST",  
                     cache:false,  
                     data:{edit_id:edit_id,name:name,email:email,password:password},  
                     success:function(data){  
                          if (data ==1) {  
                               alert("User record updated successfully");  
                               loadTableData();  
                          }else{  
                               alert("Some thing went wrong");       
                          }  
                     }  
                });  
           });
            
          
            // upload de arquivos
             $(document).on('submit', '#upload_form', function(e){
                e.preventDefault();
                  $.ajax({
                   url:"upload.php",
                   method:"POST",
                   data: new FormData(this),
                   contentType: false,
                   cache: false,
                   processData:false,
                   success: function(data) { 
                       console.log(data);
                       $(e.target).find('#input_upload_file').val('');
                        //load_folder_list();
                        //alert(data);
                       }
                  });
             });          
          
          
           
           // populando select cliente no formulário adicionar_proposta.php
                var action = 'proposta_cli'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         //console.log(data);
                         $('#cli').html(data);
                     }  
                })
          
           // populando select cliente no formulário adicionar_proposta.php
                /*var action = 'proposta_orgao'; 
                $.ajax({  
                     url:"popula_selects.php",  
                     type:"POST",  
                     cache:false,  
                     data:{action: action},  
                     success:function(data){
                         console.log(data);
                         $('#cli').html(data);
                     }  
                })*/
          
          
          
      });  
 </script>
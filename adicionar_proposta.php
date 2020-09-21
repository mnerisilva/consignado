<?php
// Header
include_once 'includes/header.php';
?>


<section class="container">
    <div class="row">
        <div class="col-me-12 col-lg-12">
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold ">Cadastro de Proposta <i class="fa fa-id-card-o" style="color: #909090"></i></h3>
            </div>
                <hr>
            <div class="card-body">
                <form action="php_action/create.php" method="POST">
                    <div class="row">
                      <div class="form-group col-md-5">
                        <label class="" for="cli">Cliente:</label>
                          <select class="form-control" name="cli" id="cli">
                            <option value="">...</option>
                            <option value="1">Carlos da Silva Junior</option>
                            <option value="2">Luiz Carlos da Silva Costa</option>
                            <option value="3">Marcelo Neri da Silva</option>
                            <option value="4">Roberto Pereira Costa</option>
                            <option value="5">Elias Cardoso Pereira</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                        <label class="" for="orgao">Órgão:</label>
                          <select class="form-control" name="orgao" id="orgao">
                            <option value="">...</option>
                            <option value="1">INSS</option>
                            <option value="2">SIAPE</option>
                            <option value="3">GOV SC</option>
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label class="" for="bn">No. Benefício (bn):</label>
                          <select class="form-control" name="bn" id="bn">
                            <option value="">...</option>
                            <option value="1">21</option>
                            <option value="2">32</option>
                            <option value="3">41</option>
                            <option value="4">42</option>
                            <option value="5">46</option>
                            <option value="6">92</option>
                            <option value="7">93</option>
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label class="" for="parce">Parcela:</label>
                        <input type="text" name="parce" class="form-control" id="parce" placeholder="Digite o valor">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="" for="opera">Operação:</label>
                          <select class="form-control" name="opera" id="opera">
                            <option value="">...</option>
                            <option value="1">Potabilidade</option>
                            <option value="2">Porta + Refi</option>
                            <option value="3">Contrato Novo</option>
                            <option value="4">Refinanciamento</option>
                          </select>
                      </div>                        
                      <div class="form-group col-md-4">
                        <label class="" for="promo">promotora:</label>
                          <select class="form-control" name="promo" id="promo">
                            <option value="">...</option>
                            <option value="1">LEWE</option>
                            <option value="2">FONTES</option>
                            <option value="3">GFT</option>
                          </select>
                      </div>                        
                      <div class="form-group col-md-4">
                        <label class="" for="vend">Vendedor:</label>
                          <select class="form-control" name="vend" id="vend">
                            <option value="">...</option>
                            <option value="1">Manoel</option>
                            <option value="2">Thauan</option>
                          </select>
                      </div>
                    </div>
                    <div class="row">                        
                      <div class="form-group col-md-6">
                        <label class="" for="situa">Situação:</label>
                          <select class="form-control" name="situa" id="situa">
                            <option value="">...</option>
                            <option value="1">Aguardando digitação</option>
                            <option value="2">Aguardando saldo devedor</option>
                            <option value="3">Aguardando averbação</option>
                            <option value="4">Averbado</option>
                            <option value="5">Aguardando Refin da Portabilidade</option>
                            <option value="7">Pendente -> Anexar contrato</option>
                            <option value="8">Pendente -> Documento pendente</option>
                            <option value="9"><span style="font-weight: 700;">Cancelado</span> -> Cliente retido</option>
                            <option value="10">Cancelado -> Número de contrato não encontrado</option>
                            <option value="11">Cancelado -> Contrato com portabilidade em andamento</option>
                            <option value="12">Cancelado -> Cliente solicitou o cancelamento</option>
                            <option value="13">Cancelado -> Margem consignável excedida</option>
                            <option value="14">Cancelado -> Cliente com restrição interna</option>
                            <option value="15">Cancelado -> Cliente com margem negativa</option>
                            <option value="16">Cancelado -> CPF irregular na receita federal</option>
                          </select>
                      </div>                        
                      <div class="form-group col-md-3">
                        <label class="" for="ade">ade:</label>
                        <input type="text" name="ade" class="form-control" id="ade">
                      </div>
                      <div class="form-group col-md-3">
                        <label class="" for="bccompra">Bco comprado:</label>
                          <select class="form-control" name="bccompra" id="bccompra">
                            <option value="">...</option>
                            <option value="1">BANRISUL</option>
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label class="" for="parceini">Parcela inicial:</label>
                        <input type="text" name="parceini" class="form-control" id="parceini" placeholder="Digite o valor">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="" for="parcefinal">Parcela final:</label>
                        <input type="text" name="parcefinal" class="form-control" id="parcefinal" placeholder="Digite o valor">
                      </div>
                      <div class="form-group col-md-4">
                        <label class="" for="ml">ml:</label>
                        <input type="text" name="ml" class="form-control" id="ml" placeholder="Digite o valor">
                      </div>
                    </div>

                    <hr />

                    <div class="row">
                      <div class="col-md-12">
                        <button type="submit" name="btn-cadastrar-proposta" class="btn btn-success">Cadastrar</button>
                        <a href="template.html" class="btn btn-default">Cancelar</a>
                      </div>
                    </div>
                </form>                                
            </div>
          </div>
        </div>
    </div>
</section>
<?php
// Footer
include_once 'includes/footer.php';
?>

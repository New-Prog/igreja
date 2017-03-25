@extends('layouts.dashboard.layout')

@section('conteudo')

<?php 

    if(!isset($membro)){ 
        $actionForm = "/membros/cadastrar/salvar";
        $messageButton = "Cadastrar";
        $membro = null;
    } else { 
        $actionForm = "/membros/up/{$membro['id']}";
        $messageButton = "Alterar";
    }
?>
<h3><i class="fa fa-angle-right"></i> Cadastro de Membros</h3>



<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    
    <form class="form-horizontal style-form" method="post" action="{{ $actionForm }}">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pesoais</h4>

            <div class="form-group">
                <div class="col-sm-6 ">
                    <label class="control-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{ $membro['nome']}}" placeholder="EX: João">
                </div>  
                <div class="col-sm-6">
                    <label class="control-label">E-mail:</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ $membro['email']}}" placeholder="EX: joao@ibvn.com.br">
                </div>  

            <!-- </div> 
            <div class="form-group"> -->
     
             </div>  
<!-- 
            <div class="form-group">

            </div>   
 -->

            <div class="form-group">
                <div class="col-sm-6">
                    <label class="control-label">CPF:</label>
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $membro['cpf']}}">
                </div>  
                <div class="col-sm-2">
                    <label class=" control-label">Sexo</label>
                    <div class="radio">
                        <label>
                        <input type="radio" name="sexo" id="sexoM" value="m" <?= $membro['sexo'] == 'm' ? 'checked' : '' ?> >
                            Masculino
                        </label>
<!--                         </div>
                    <div class="radio"> -->
                        <label>
                        <input type="radio" name="sexo" id="sexoF" value="f" <?= $membro['sexo'] == 'f' ? 'checked' : '' ?> >
                            Feminino
                        </label>
                    </div>
                </div>   
                <div class="col-sm-4">
                <label class="control-label">Estado Civil</label>
                    <select type="tipo" class="form-control">
                        <option <?= $membro['estado_civil'] == 'solteiro' ? 'selected' : '' ?> value="solteiro">Solteiro(a)</option>
                        <option <?= $membro['estado_civil'] == 'casado' ? 'selected' : '' ?> value="casado">Casado(a)</option>
                        <option <?= $membro['estado_civil'] == 'divorciado' ? 'selected' : '' ?> value="divorciado">Divorciado(a)</option>
                        <option <?= $membro['estado_civil'] == 'viuvo' ? 'selected' : '' ?> value="viuvo">Viúvo(a)</option>
                        <option <?= $membro['estado_civil'] == 'separado' ? 'selected' : '' ?> value="separado">Separado(a)</option>
                        <option <?= $membro['estado_civil'] == 'companheiro' ? 'selected' : '' ?> value="companheiro">Companheiro(a)</option>
                    </select>
                </div> 
            </div>   
<!-- 
            <div class="form-group">

            </div>  -->

            <div class="form-group">
                <div class="col-sm-4">
                    <label class="control-label">Telefone Residencial:</label>
                    <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $membro['telefone']}}" placeholder="(11)1111-111">
                </div>  
<!--             </div>   

            <div class="form-group"> -->
                <div class="col-sm-4 col-sm-offset-1">
                    <label class="control-label">Celular:</label>
                    <input id="celular" type="text" class="form-control" name="celular" value="{{ $membro['celular']}}" placeholder="(11)11111-111">
                </div>  
            </div>   
            
            <h4 class="mb"><i class="fa fa-angle-right"></i>Endereço</h4>
            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">CEP:</label>
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $membro['cep']}}">
                </div>  
<!--             </div>  

            <div class="form-group"> -->
                <div class="col-sm-5">
                   <label class="control-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" value="{{ $membro['logradouro']}}">
                </div>  
<!--             </div> 

            <div class="form-group"> -->
                <div class="col-sm-1">
                    <label class="control-label">Numero</label>
                    <input type="text" class="form-control" name="numero" value="{{ $membro['numero']}}">
                </div>  
                <div class="col-sm-4">
                    <label class="control-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" value="{{ $membro['complemento']}}">
                </div>  
            </div>   

<!--             <div class="form-group">
            </div>    -->

            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" value="{{ $membro['bairro']}}">
                </div>  
<!--             </div>  
            
            <div class="form-group"> -->
                <div class="col-sm-4">
                    <label class="control-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" value="{{ $membro['cidade']}}">
                </div>  
<!--             </div>  

            <div class="form-group"> -->
                <div class="col-sm-1">
                    <label class="control-label">Estado</label>
                    <input type="text" class="form-control" name="estado" value="{{ $membro['estado']}}">
                </div>  
            </div>  

            <h4 class="mb"><i class="fa fa-angle-right"></i>Celula</h4>
            <div class="form-group">
                <label class="col-sm-1  control-label">Celula Participante</label>
                <div class="col-sm-11">
                    <select type="tipo" class="form-control"  name="fk_celula">
                            <option value="">--Selecione--</option>
                        @foreach ($celulas as $celula)
                            <option <?= ($membro['fk_celula']==$celula['id']) ? 'selected' : ''?> value="{{ $celula['id'] }}">{{ $celula['nome'] }}</option>
                        @endforeach
                    </select>
                </div>  
            </div> 
 
            <h4 class="mb"><i class="fa fa-angle-right"></i>Hierarquia</h4>
            <div class="form-group">
                <label class="col-sm-1  control-label">Tipo de membro</label>
                <div class="col-sm-11">
                    <select type="tipo" class="form-control" name="tipo">
                        <option value="">--Selecione--</option>
                        <option <?= $membro['tipo'] == 'membro' ? 'selected' : '' ?> value="membro">Membro</option>
                        <option <?= $membro['tipo'] == 'lider'  ? 'selected' : '' ?> value="lider">Lider</option>
                        <option <?= $membro['tipo'] == 'pastor' ? 'selected' : '' ?> value="pastor">Pastor</option>
                    </select>
                </div>  
            </div> 
        </div>   
        

        <div class="form-panel barra-botoes">
            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <a href="/membros/consultar" class='btn btn-danger'>Cancelar</a>
                    <!-- <button type="submit" class="btn btn-danger">Cancelar</button> -->
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button id="btn_enviar" class="btn btn-success">{{ $messageButton }}</button>
                </div>  
            </div> 
        </div>  

    </form>

    </div>
  </div><!-- col-lg-12-->      	
</div><!-- /row -->


<script type="text/javascript" src="/dashboard_layout/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script>

    $("#btn_enviar").on('click', function () {
        $("#cep").val($("#cep").val().replace('-', ''));
    }); 

    $(document).ready(function ($) { 
        $("#cpf").mask('000.000.000-00', {reverse: true});
        $("#telefone").mask('(00)0000-0000', {reverse: false});
        $("#celular").mask('(00)00000-0000', {reverse: false});
        $("#cep").mask('00000-000', {reverse: false});
        $('#email').mask("A", {
            translation: {
                "A": { pattern: /[\w@\-.+]/, recursive: true }
            }
        });

    });

    
</script>




      
@stop
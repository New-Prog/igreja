@extends('layouts.dashboard.layout')

@section('conteudo')
<?php 
    // var_dump($reuniao->nome);
    // exit;

    if(!isset($reuniao)){ 
        $actionForm = "/reunioes/cadastrar/salvar";
        $messageButton = "Cadastrar";
        $reuniao = null;
    } else { 
        $actionForm = "/reunioes/up/{$reuniao['id']}";
        $messageButton = "Alterar";
    }

?>
<h3><i class="fa fa-angle-right"></i> Cadastro de Reunião</h3>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    
    <form class="form-horizontal style-form" method="post" action="/reunioes/cadastrar/save">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Reunião</h4>
                
            <div class="form-group">
                <div class="col-sm-6">
                <label class="control-label">Tema:</label>
                    <input id="tema" type="text" class="form-control" value="{{ $reuniao['tema'] }}" name="tema">
                </div>  
<!--             </div>   

            <div class="form-group"> -->
                <div class="col-sm-6">
                    <label class="control-label">Celula Participante</label>
                    <select type="tipo" class="form-control"  name="fk_celula">
                            <option value="">--Selecione--</option>
                        @foreach ($celulas as $celula)
                            <option <?= ($reuniao['fk_celula']==$celula['id']) ? 'selected' : ''?> value="{{ $celula['id'] }}">{{ $celula['nome'] }}</option>
                        @endforeach
                    </select>
                </div>   
            </div> 

            <div class="form-group">
                <div class="col-sm-6">
                    <label class="control-label">Descrição</label>
                    <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $reuniao['descricao']}}">
                </div>  
                <div class="col-sm-6">
                    <label class="control-label">Data</label>
                    <input id="data" type="text" class="form-control" name="data" value="{{ $reuniao['data']}}">
                </div>  
            </div> 

            <h4 class="mb"><i class="fa fa-angle-right"></i>Endereço</h4>
            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">CEP:</label>
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $reuniao['cep']}}" placeholder="00000-000">
                </div>  
<!--             </div>  

            <div class="form-group"> -->
                <div class="col-sm-5">
                   <label class="control-label">Logradouro</label>
                    <input id='logradouro' type="text" class="form-control" name="logradouro" value="{{ $reuniao['logradouro']}}" placeholder="Rua xxxxx">
                </div>  
<!--             </div> 

            <div class="form-group"> -->
                <div class="col-sm-1">
                    <label class="control-label">Numero</label>
                    <input id='numero' type="text" class="form-control" name="numero" value="{{ $reuniao['numero']}}" placeholder="132">
                </div>  
                <div class="col-sm-4">
                    <label class="control-label">Complemento</label>
                    <input id='complemento' type="text" class="form-control" name="complemento" value="{{ $reuniao['complemento']}}">
                </div>  
            </div>   

<!--             <div class="form-group">
            </div>    -->

            <div class="form-group">
                <div class="col-sm-2">
                    <label class="control-label">Bairro</label>
                    <input id='bairro' type="text" class="form-control" name="bairro" value="{{ $reuniao['bairro']}}" placeholder="Centro">
                </div>  
<!--             </div>  
            
            <div class="form-group"> -->
                <div class="col-sm-4">
                    <label class="control-label">Cidade</label>
                    <input id='cidade' type="text" class="form-control" name="cidade" value="{{ $reuniao['cidade']}}" placeholder="São Paulo">
                </div>  
<!--             </div>  

            <div class="form-group"> -->
                <div class="col-sm-1">
                    <label class="control-label">Estado</label>
                    <input id='estado' type="text" class="form-control" name="estado" value="{{ $reuniao['estado']}}" placeholder="SP">
                </div>  
            </div>  

        <div class="form-panel barra-botoes">
            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button id='btn_cancelar' type="button" class="btn btn-danger">Cancelar</button>:
                    <button id='btn_limpar' type="button" class="btn btn-warning">Limpar</button>
                    <button id="btn_enviar" class="btn btn-success">{{ $messageButton }}</button>
                </div>  
            </div> 
        </div>  

    </form>

  </div><!-- col-lg-12-->      	
</div><!-- /row -->
<script type="text/javascript" src="/dashboard_layout/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script>


    $(document).ready(function ($) { 
        $('#cep').on('blur', function (data) {
            $.get( "http://api.postmon.com.br/v1/cep/"+$(this).val(), function(data) {
                $('#bairro').val(data.bairro); 
                $('#cidade').val(data.cidade);
                $('#estado').val(data.estado);
                $('#logradouro').val(data.logradouro);

            });
        });
        $(document).on('click', ".btn-danger" , function( event ) {
            event.stopImmediatePropagation();
            $('#conteudo-principal').load("/reunioes/consultar");
            return false;
        });

        $('#btn_limpar').on('click', function() {
            $('input').val('');
            $('select').val('');
        });

        $("#btn_enviar").on('click', function () {
            $("#cep").val($("#cep").val().replace('-', ''));
            var data = $("#data").val();
            data = data.split('/');

            $("#data").val(data[2]+"-"+data[1]+"-"+data[0]);

        }); 


        $("#data").mask('00/00/0000', {reverse: false});
        $("#telefone").mask('(00)0000-0000', {reverse: false});
        $("#celular").mask('(00)00000-0000', {reverse: false});
        $("#cep").mask('00000-000', {reverse: false});
    });

    
</script>


      
@stop
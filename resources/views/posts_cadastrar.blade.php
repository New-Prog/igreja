@extends('layouts.dashboard.layout')

@section('conteudo')
<?php 
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
    
    <form class="form-horizontal style-form" method="post" action="/celulas/cadastrar/save">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Reunião</h4>
                
            <div class="form-group">
                <label class="col-sm-1  control-label">Tema</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="tema">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Celula</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="celula">
                </div>  
            </div> 

      <div class="form-group">
                <label class="col-sm-1  control-label">Cep</label>
                <div class="col-sm-11">
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $reuniao['cep']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Logradouro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="logradouro" value="{{ $reuniao['logradouro']}}">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Numero</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="numero" value="{{ $reuniao['numero']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Complemento</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="complemento" value="{{ $reuniao['complemento']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Bairro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="bairro" value="{{ $reuniao['bairro']}}">
                </div>  
            </div>  
            
            <div class="form-group">
                <label class="col-sm-1  control-label">Cidade</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cidade" value="{{ $reuniao['cidade']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Estado</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="estado" value="{{ $reuniao['estado']}}">
                </div>  
            </div>  

            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button type="submit" class="btn btn-success">{{ $messageButton }}</button>
                </div>  
            </div> 
        </div>
    </form>

  </div><!-- col-lg-12-->      	
</div><!-- /row -->

      
@stop
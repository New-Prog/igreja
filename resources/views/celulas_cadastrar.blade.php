@extends('layouts.dashboard.layout')

@section('conteudo')
<?php 

    if(!isset($celula)){ 
        $actionForm = "/celulas/cadastrar/save";
        $messageButton = "Cadastrar";
        $celula_nome =  $celula_id = $celula_lider = '';
    } else { 
        $actionForm = "/celulas/up/{$celula['id']}";
        $messageButton = "Alterar";
        $celula_nome  = $celula['nome'];
        $celula_id    = $celula['id'];
        $celula_lider = $celula['lider'];
    }
    
?>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    
    <form class="form-horizontal style-form" method="post" action="{{ $actionForm }}">

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Nova Célula</h4>
                
            <div class="form-group">
                
                <div class="col-sm-6">
                	<label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{$celula_nome}}" required="true">
                </div>  
                <div class="col-sm-6">
                 	<label>Líder</label>
                    
                    <select class="form-control" name="lider" >
                       <option value="">--Selecione--</option>
                        @foreach ($lideres as $lider)
                            <option <?= ($celula_lider == $lider['id']) ? 'selected' : '' ?> value="{{ $lider['id'] }}"> {{ $lider['nome'] }}</option>
                        @endforeach
                    </select>          
                </div> 
            </div>  
        <div class="form-panel">
			<div class="row">
                <div class="col-sm-12 col-xs-12 ">
                	<div class="pull-right">
	                    <a href="/celulas/consultar" class='btn btn-danger'>Cancelar</a>
	                    <button type="button" id="btn-limpar" class="btn btn-warning">Limpar</button>
	                    <button class="btn btn-success">{{ $messageButton }}</button>
                    </div>
                </div>  
             </div>
 
        </div>  
        
    </form>

  </div><!-- col-lg-12-->      	
</div><!-- /row -->

<<script type="text/javascript" src="{!! asset('js/celula_cadastrar.js') !!}" ></script>

@stop
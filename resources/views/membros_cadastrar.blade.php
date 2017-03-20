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
                <label class="col-sm-1  control-label">Nome</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="nome" value="{{ $membro['nome']}}">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Sexo</label>
                <div class="col-sm-11">
                    <div class="radio">
                            <label>
                            <input type="radio" name="sexo" id="sexoM" value="m" <?= $membro['sexo'] == 'm' ? 'checked' : '' ?> >
                                Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                            <input type="radio" name="sexo" id="sexoF" value="f" <?= $membro['sexo'] == 'f' ? 'checked' : '' ?> >
                                Feminino
                            </label>
                        </div>
                    </div>   
                </div>  


            

            <div class="form-group">
                <label class="col-sm-1  control-label">Cpf</label>
                <div class="col-sm-11">
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $membro['cpf']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Estado Civil</label>
                <div class="col-sm-11">
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

            <div class="form-group">
                <label class="col-sm-1  control-label">E-mail</label>
                <div class="col-sm-11">
                    <input id="email" type="text" class="form-control" name="email" value="{{ $membro['email']}}">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Telefone</label>
                <div class="col-sm-11">
                    <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $membro['telefone']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Celular</label>
                <div class="col-sm-11">
                    <input id="celular" type="text" class="form-control" name="celular" value="{{ $membro['celular']}}">
                </div>  
            </div>   
            
            <div class="form-group">
                <label class="col-sm-1  control-label">Cep</label>
                <div class="col-sm-11">
                    <input id="cep" type="text" class="form-control" name="cep" value="{{ $membro['cep']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Logradouro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="logradouro" value="{{ $membro['logradouro']}}">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Numero</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="numero" value="{{ $membro['numero']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Complemento</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="complemento" value="{{ $membro['complemento']}}">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Bairro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="bairro" value="{{ $membro['bairro']}}">
                </div>  
            </div>  
            
            <div class="form-group">
                <label class="col-sm-1  control-label">Cidade</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cidade" value="{{ $membro['cidade']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Estado</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="estado" value="{{ $membro['estado']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Latitude</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="latitude" value="{{ $membro['latitude']}}">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Longitude</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="longitude" value="{{ $membro['longitude']}}">
                </div>  
            </div>  

            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>Celula</h4>
                <div class="form-group">
                    <label class="col-sm-1  control-label">Celula Participante</label>
                    <div class="col-sm-11">
                        <select type="tipo" class="form-control">
                            <option val="1">Celula Deus Vivo</option>
                            <option val="2">Celula Amor Paterno</option>
                            <option val="3">Celula novos Discipulos</option>
                        </select>
                    </div>  
                </div> 
            </div>   


            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>Hierarquia</h4>
                <div class="form-group">
                    <label class="col-sm-1  control-label">Tipo de membro</label>
                    <div class="col-sm-11">
                        <select type="tipo" class="form-control">
                            <option val="membro">Membro</option>
                            <option val="lider">Lider</option>
                            <option val="pastor">Pastor</option>
                        </select>
                    </div>  
                </div> 
            </div>   
        </div>   

   
        <div class="form-panel">
            <div class="form-group">
                <div class="col-sm-11 grupo_btn_cadastro">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Limpar</button>
                    <button type="submit" class="btn btn-success">{{ $messageButton }}</button>
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
    $(document).ready(function ($) { 
        $("#cpf").mask('000.000.000-00', {reverse: true});
        $("#telefone").mask('(00)0000-0000', {reverse: false});
        $("#celular").mask('(00)00000-0000', {reverse: false});
        $("#cep").mask('0000-000', {reverse: false});
        $('#email').mask("A", {
            translation: {
                "A": { pattern: /[\w@\-.+]/, recursive: true }
            }
        });
    });

    
</script>



      
@stop
@extends('layouts.dashboard.layout')

@section('conteudo')

<h3><i class="fa fa-angle-right"></i> Cadastro de Membros</h3>
{{ $membro }}
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    
    <form class="form-horizontal style-form" method="post" action="/membros/cadastrar/salvar">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pesoais</h4>
                
            <div class="form-group">
                <label class="col-sm-1  control-label" value="">Nome</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="nome">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Sexo</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="sexo">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Cpf</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cpf">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Estado Civil</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="estado_civil">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">E-mail</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="email">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Telefone</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="telefone">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Celular</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="celular">
                </div>  
            </div>   
            
            <div class="form-group">
                <label class="col-sm-1  control-label">Cep</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cep">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Logradouro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="logradouro">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Numero</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="sobrenome">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Complemento</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="complemento">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Bairro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="bairro">
                </div>  
            </div>  
            
            <div class="form-group">
                <label class="col-sm-1  control-label">Cidade</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cidade">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Estado</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="estado">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Latitude</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="latitude">
                </div>  
            </div>  

            <div class="form-group">
                <label class="col-sm-1  control-label">Longitude</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="longitude">
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
                <div class="col-sm-11">
                    <button type="submit" class="btn btn-theme">Limpar</button>
                    <button type="submit" class="btn btn-theme">Cancelar</button>
                    <button type="submit" class="btn btn-theme">Salvar</button>
                </div>  
            </div> 
        </div>  

    </form>

    </div>
  </div><!-- col-lg-12-->      	
</div><!-- /row -->

      
@stop
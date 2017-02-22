@extends('layouts.dashboard.layout')

@section('conteudo')

<h3><i class="fa fa-angle-right"></i> Cadastro de Membros</h3>

<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
  <div class="col-lg-12">
    
    <form class="form-horizontal style-form" method="get">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Dados Pesoais</h4>
                
            <div class="form-group">
                <label class="col-sm-1  control-label">Nome</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="nome">
                </div>  
            </div> 

            <div class="form-group">
                <label class="col-sm-1  control-label">Sobrenome</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="sobrenome">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Data Nascimento</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="dtnasc">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Telefone</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="telefone">
                </div>  
            </div>   

            <div class="form-group">
                <label class="col-sm-1  control-label">Telefone Celular</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="celular">
                </div>  
            </div>   

        </div>   

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Endereço</h4>
                
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
                <label class="col-sm-1  control-label">Cep</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="cep">
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

        </div>   

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Hierarquia</h4>
                
            <div class="form-group">
                <label class="col-sm-1  control-label">Tipo de membro</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="logradouro">
                </div>  
            </div> 

        </div>   

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>Hierarquia</h4>
            <div class="form-group">
                <label class="col-sm-1  control-label">Tipo de membro</label>
                <div class="col-sm-11">
                    <select class="form-control">
                        <option>Membro</option>
                        <option>Lider</option>
                        <option>Pastor</option>
                    </select>
                </div>  
            </div> 
        </div>  

        <div class="form-panel">
            <div class="form-group">
                <div class="col-sm-11">
                    <button type="submit" class="btn btn-theme">Limpar</button>
                    <button type="submit" class="btn btn-theme">Cancelar</button>
                    <button type="submit" class="btn btn-theme">Limpar</button>
                </div>  
            </div> 
        </div>  

    </form>

    </div>
  </div><!-- col-lg-12-->      	
</div><!-- /row -->

      
@stop
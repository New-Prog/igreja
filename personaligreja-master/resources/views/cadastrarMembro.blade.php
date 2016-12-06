@extends('layouts/principal')

@section('conteudo')
<form class="form">
    <fieldset class="form-group col-sm-10">

        <fieldset class="form-group">
            <legend>Informações Pessoais</legend>

	        <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" name="nome" id="nome" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Sobrenome:</label>
                <div class="col-sm-10">
                    <input type="text" name="snome" id="snome" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">CPF:</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf" id="cpf" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">RG:</label>
                <div class="col-sm-10">
                    <input type="text" name="rg" id="rg" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Nome da Mãe:</label>
                <div class="col-sm-10">
                    <input type="text" name="nmae" id="nmae" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Conjuge:</label>
                <div class="col-sm-10">
                    <input type="text" name="nconjuge" id="nconjuge" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Telefone residencial:</label>
                <div class="col-sm-10">
                    <input type="text" name="telefresid" id="telefresid" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Telefone Celular:</label>
                <div class="col-sm-10">
                    <input type="text" name="telefcel" id="telefcel" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Telefone comercial:</label>
                <div class="col-sm-10">
                    <input type="text" name="telefcom" id="telefcom" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Naturalidade:</label>
                <div class="col-sm-10">
                    <input type="text" name="naturalidade" id="naturalidade" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Nacionalidade:</label>
                <div class="col-sm-10">
                    <input type="text" name="nacionalidade" id="nacionalidade" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Escolaridade:</label>
                <div class="col-sm-10">
                    <input type="text" name="escolaridade" id="escolaridade" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Profissão:</label>
                <div class="col-sm-10">
                    <input type="text" name="profissao" id="profissao" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Como Conheceu a igreja:</label>
                <div class="col-sm-10">
                    <input type="text" name="comoconheceu" id="comoconheceu" class="form-control"/>
                </div>
            </div>
                
            <div class="form-group row">
                <label for="nome" class="col-sm-2 form-control-label">Detalhes:</label>
                <div class="col-sm-10">
                    <textarea type="text-area" name="detalhes" id="detalhes" class="form-control"/></textarea>
                </div>
            </div>
                
            
        </fieldset>
            

        <fieldset class="form-group">
            <legend>Dizimos e Ofertas</legend>

            <div class="form-group row">
                <label for="" class="col-sm-2 form-control-label">É Dizimista:</label>

                <label class="radio-inline">
                    <input type="radio" name="dizimista" id="dizimistaY" value="s" checked> Sim
                </label>

                <label class="radio-inline">
                    <input type="radio" name="dizimista" id="dizimistaN" value="n"> Não
                </label>
            </div>

            <div class="form-group row">
                <label for="renda" class="col-sm-2 form-control-label">Renda:</label>
                <div class="col-sm-10">
                    <input type="text" name="detalhes" id="detalhes" class="form-control"/>
                </div>
            </div>

        </fieldset>

        <fieldset class="form-group">
            <legend>Redes Sociais e Web</legend>

            <div class="form-group row">
                <label for="email" class="col-sm-2 form-control-label">E-Mail:</label>
                <div class="col-sm-10">
                    <input type="text" name="email" id="email" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="site" class="col-sm-2 form-control-label">Site:</label>
                <div class="col-sm-10">
                    <input type="text" name="site" id="site" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="facebook" class="col-sm-2 form-control-label">Facebook:</label>
                <div class="col-sm-10">
                    <input type="text" name="facebook" id="facebook" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="twitter" class="col-sm-2 form-control-label">Twitter:</label>
                <div class="col-sm-10">
                    <input type="text" name="twitter" id="twitter" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="youtube" class="col-sm-2 form-control-label">You Tube:</label>
                <div class="col-sm-10">
                    <input type="text" name="youtube" id="youtube" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="linkedin" class="col-sm-2 form-control-label">Linkedin:</label>
                <div class="col-sm-10">
                    <input type="text" name="linkedin" id="linkedin" class="form-control"/>
                </div>
            </div>
        </fieldset>

        <fieldset class="form-group">
            <legend>Profissão de Fé</legend>

            <div class="form-group row">
                <label for="profissaodefe" class="col-sm-1 form-control-label">Profissão de fé:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

                <label for="profissaodefe" class="col-sm-1 form-control-label">Data:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

                <label for="profissaodefe" class="col-sm-1 form-control-label">Local:</label>

                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="profissaodefe" class="col-sm-1 form-control-label">Batismo</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

                <label for="profissaodefe" class="col-sm-1 form-control-label">Data:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

                <label for="profissaodefe" class="col-sm-1 form-control-label">Local:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="profissaodefe" class="col-sm-3 form-control-label">Aceitação no Minístério por:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

                <label for="profissaodefe" class="col-sm-1 form-control-label">Data:</label>
                <div class="col-sm-3">
                    <input type="text" name="profissaodefe" id="profissaodefe" class="form-control"/>
                </div>

            </div>

        
        </fieldset>

        <fieldset class="form-group">
            <legend>Ministério</legend>

             <div class="form-group row">
                <label for="linkedin" class="col-sm-2 form-control-label">Ministério:</label>
                <div class="col-sm-10">
                    <input type="text" name="linkedin" id="linkedin" class="form-control"/>
                </div>
            </div>

        </fieldset>
        <button type="submit" class="btn btn-success">Registrar</button>
        <button type="submit" class="btn btn-danger">Cancelar</button>
    </fieldset>
</form>
@endsection

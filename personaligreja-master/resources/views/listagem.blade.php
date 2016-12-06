@extends('layouts/principal')

@section('conteudo')
    <table class="table">
        <tr>
            <th>Nome</th>
            <th>Sobrenome</th>
        </tr>
        <?php foreach ($membros as $m) :?>
            <tr>
                <td><?= $m->nome ?></td>
                <td><?= $m->snome ?></td>
            </tr>
        <?php endforeach ?>
    </table>
@stop
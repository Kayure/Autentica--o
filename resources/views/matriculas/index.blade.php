<!-- NÃO CONSEGUI PASSAR O PARAMETRO PRA ESSA ROTA, POR ISSO CRIEI UM OUTRO BOTAO" -->
@extends('templates.main', ['titulo' => "Matriculas", 'rota' => "alunos.index"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Matriculas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            
            <!-- Utiliza o componente "datalist" criado -->
            <x-matriculaDatalist 
                :header="['ID MATRICULA', 'DISCIPLINAS','EIXO']" 
                :data="$aluno"
                :hide="[true, true, true, true]" 

                
                
                
            />

        </div>
    </div>
@endsection
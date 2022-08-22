<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Aluno;
use App\Models\Matricula;



class MatriculaController extends Controller
{

    public function index()
    {


    }

    public function create($id)
    {
        $disciplinas = Disciplina::all();
        $aluno = Aluno::with(['disciplina'])->get()->find($id);

        return view('matriculas.create', compact(['disciplinas','aluno']));
    }


    public function store(Request $request){
        $aluno = Aluno::find($request->aluno_id);
        $aluno->disciplina()->detach();

        if(isset($request['disciplina_id'])) {
            foreach($request['disciplina_id'] as $item) {
                $disciplina = Disciplina::find($item);
                if(isset($disciplina)){

                    //CRIANDO A NOVA MATRICULA
                    $matricula = new Matricula();
                    $matricula->aluno()->associate($aluno);
                    $matricula->disciplina()->associate($disciplina);
                    $matricula->save();
                }
            }
        }

        return view('matriculas.index', compact(['aluno']));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    //FUNÇÃO PARA ABRIR AS MATRICULAS
    public function show($id)
    {

        $aluno = Aluno::with(['disciplina'])->get()->find($id);


        return view('matriculas.index', compact(['aluno']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function listar($id) {

        //É ASSIM QUE PASSA UAS TABELAS ?
        // $aluno = Aluno::with(['disciplina'],['eixo'])->get()->find($id);


        // return view('matriculas.index', compact(['aluno'],['eixo']));
    }



    //FUNÇÃO PARA ADICIONAR UMA MATRICULA
    public function add($id)
    {
        $disciplinas = Disciplina::all();
        $aluno = Aluno::with(['disciplina'])->get()->find($id);

        return view('matriculas.add', compact(['disciplinas','aluno']));

    }


}

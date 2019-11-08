@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 5%;">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="card" style="width: 60rem;">
                <div class="card-body">
                  <h5 class="card-title">Cadastrar de Projeto</h5>
                    <form action="{{ route('admin.create') }}" method="post">
                        @csrf
                        <div class="row col-8">
                               
                            <div class="form-group">
                                <label for="name-project">Projeto</label>
                                <input type="text" class="form-control" name="name" placeholder="nome do projeto">
                            </div>
                        </div>
                         
                     
                      <button class="btn btn-primary btn-sm" type="submit">Criar</button>
                    </form>
                </div>
        </div>
    </br>
       

        <div class="card"  style="width: 60rem;">
            <div class="card-body">
                <h5 class="card-title">Lista de Projeto</h5>
            
                <div class=" table-striped table-responsible-sm">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nome do Projeto</th>
                                <th>Vincular atividade</th>
                                <th>Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)

                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td>{{$project->name}}</td>
                                <td><a href="{{ route('admin.link-activities', ['id'=>$project->id]) }}">atividade</a></td>
                                <td><a href="{{ route('admin.shows', ['id'=>$project->id]) }}"> Visualizar Projeto</a></td>
                                </tr>
                                
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>



</div>

@endsection
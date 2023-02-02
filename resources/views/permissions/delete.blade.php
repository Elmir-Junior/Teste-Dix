@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Tem certeza que deseja excluir essa Permissão ?</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{$permission->name}}" disabled>
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{$permission->description}}" disabled>
                </div>
            </div>

            <div class="card-footer">
                <form method="POST" action="{{ route('permissions.destroy', ['permission' => $permission->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-danger">Excluir</button>
                    <a href="{{ route('permissions.index') }}"><i class="btn btn-fill btn-secondary">Voltar</i></a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
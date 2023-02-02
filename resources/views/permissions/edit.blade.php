@extends('layouts.app', ['page' => 'Permissoes', 'pageSlug' => 'permissions'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Editar Permissão</h3>
                    </div>

                </div>
                <form method="POST" action="{{ route('permissions.update', ['permission' => $permission->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}">
                    </div>
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$permission->description}}">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-primary">Volta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@extends('layouts.app', ['page' => 'Permissoes', 'pageSlug' => 'permissions'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Criar Permissão</h3>
                    </div>
                </div>

                <form method="POST" action="{{ route('permissions.create') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('permissions.index') }}" class="btn btn-primary">Volta</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
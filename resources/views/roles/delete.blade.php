@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Tem certeza que deseja excluir essa Atribuição ?</h5>
            </div>
            <div class="card-body">


            <div class="card-footer">
            <form method="POST" action="{{ route('roles.destroy', ['role' => $role]) }}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
                <a href="/"><i class="btn btn-fill btn-secondary">Voltar</i></a>
            </form>
            </div>
            
        </div>
    </div>
</div>

@endsection

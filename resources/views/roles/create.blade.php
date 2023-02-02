@extends('layouts.app', ['page' => 'Atribuicoes', 'pageSlug' => 'roles'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h3 class="card-title">Cadastrar Atribuição</h3>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Volta</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!!Form::open()->method('post')->route('roles.store')!!}
                    @include('roles._form')
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection

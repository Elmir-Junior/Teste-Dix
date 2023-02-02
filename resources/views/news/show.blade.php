@extends('layouts.app', ['pageSlug' => 'newss'])
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="title">{{ $news->title }}</h5>
            </div>

            <div>
                <img src="{{ asset('img/news/'.$news->image) }}" alt="{{$news->titulo }}" class="img-show">
            </div>

            <div class="card-body">

                <div class="form-group">
                    <h1 type="text">{{$news->titulo}}</h1>
                </div>
                <div class="form-group">
                    <h4>{{$news->conteudo}}</h4>
                </div>
            </div>
        </div>
        <i class="btn btn-fill btn-secondary"><a href="/">Voltar</a></i>
    </div>
</div>






@endsection
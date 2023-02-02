@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')

<div class="container">
    <div class="row">
        @foreach($news as $new)
        <div class="col-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                        <a href="/news/show/{{$new->id}}">
                            <img class="avatar" src="/img/news/{{$new->image}}" alt="{{ $new->titulo }}">
                        </a>
                        <p class="description">
                            {{ $new->titulo }}
                        </p>
                    </div>
                    </p>
                    <div class="card-description">
                        {{ substr($new->conteudo, 0, 30) }}...
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <a href="{{ route('news.show', $new->id) }}" class="btn btn-sucess">Ver</a>
                        
                        <a href="{{ route('news.edit', $new->id) }}" class="btn btn-info">Editar</a>
                        
                        <a href="{{ route('news.delete', $new->id) }}" class="btn btn-danger">Excluir</a>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Tem certeza que deseja excluir essa Noticia ?</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{$new->titulo}}" disabled>
                </div>

                <div class="form-group">
                    <label>Conteudo</label>
                    <textarea class="form-control" name="conteudo" rows="4" disabled>{{$new->conteudo}}</textarea>
                </div>

                <label>Imagem</label>
                <img src="{{ asset('img/news/'.$new->image) }}" alt="{{$new->titulo }}" class="img-preview">

            </div>

            <div class="card-footer">
            <form method="POST" action="{{ route('news.destroy', ['news' => $new->id]) }}" enctype="multipart/form-data">
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

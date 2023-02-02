@extends('layouts.app', ['pageSlug' => 'news'])
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Editar Noticia</h5>
            </div>
            <form method="POST" action="{{ route('news.update', ['news' => $news->id]) }}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="{{$news->titulo}}">
                    </div>

                    <div class="form-group">
                        <label>Conteudo</label>
                        <textarea class="form-control" name="conteudo" rows="4">{{$news->conteudo}}</textarea>
                    </div>

                    <label>Imagem</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" accept="image/*">
                        <label class="custom-file-label" for="inputGroupFile01">Escolha a Imagem</label>
                    </div>
                    <img src="/img/news/{{ $news->image }}" alt="/img/events/{{$news->titulo }}" class="img-preview">

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Salvar</button>
                    <a href="/"><i class="btn btn-fill btn-secondary">Voltar</i></a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
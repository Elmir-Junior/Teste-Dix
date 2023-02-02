@extends('layouts.app', ['pageSlug' => 'createnews'])
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Criar Noticia</h5>
            </div>
            <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Conteudo</label>
                        <textarea class="form-control" name="conteudo" rows="4"></textarea>
                    </div>

                    <label>Imagem</label>
                    <div class="custom-file">
                        <input type="file" name="image"class="custom-file-input" id="inputGroupFile01" accept="image/*">
                        <label class="custom-file-label" for="inputGroupFile01">Escolha a Imagem</label>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Criar</button>
                    <a href="/"><i class="btn btn-fill btn-secondary">Voltar</i></a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
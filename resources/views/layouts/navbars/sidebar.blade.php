<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="{{ route('news.index') }}" class="simple-text logo-normal bi bi-newspaper"> Noticias</a>
        </div>
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#collapseNoticia" aria-expanded="false" class="collapsed">
                    <i class="bi bi-newspaper"></i>
                    <span class="nav-link-text">Notícias</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="collapseNoticia" style="">
                    <ul class="nav pl-4">

                        <li @if ($pageSlug=='createnews' ) class="active " @endif>
                            <a href="{{ route('news.create') }}">
                                <i class="bi bi-plus-lg"></i>
                                <p>Cadastrar Notícia</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

        </ul>
        {{-- Gerenciamento --}}
        @role('Super Admin')
        <ul class="nav">
            <li>
                <a data-toggle="collapse" href="#collapseGerenciamento" aria-expanded="false" class="collapsed">
                    <i class="bi bi-person-gear"></i>
                    <span class="nav-link-text fa-users-cog">Gerenciamento</span>
                    <b class="caret mt-1"></b>
                </a>


                <div class="collapse" id="collapseGerenciamento" style="">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a href="{{ route('user.index')}} ">
                                <i class="fas fa-users"></i>
                                <p>Usuários</p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='roles' ) class="active " @endif>
                            <a href=" {{route('roles.index')}} ">
                                <i class="bi bi-person-fill-lock"></i>
                                <p>Atribuições</p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='permissions' ) class="active " @endif>
                            <a href="{{ route('permissions.index') }}">
                                <i class="fas fa-lock"></i>
                                <p>Permissões</p>
                            </a>
                        </li>
                    </ul>
                </div>
                @endrole
            </li>
        </ul>
    </div>
</div>
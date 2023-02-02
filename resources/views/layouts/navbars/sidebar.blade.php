<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="{{ route('news.index') }}" class="simple-text logo-normal">Noticias</a>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('news.index') }}">
                    <i class="fas fa-user-friends"></i>
                    <p>Noticias</p>
                </a>
            </li>

            {{-- Gerenciamento --}}
            <li>
                <a data-toggle="collapse" href="#collapseGerenciamento" aria-expanded="false" class="collapsed">
                    <i class="fas fa-users-cog"></i>
                    <span class="nav-link-text">Gerenciamento</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="collapseGerenciamento" style="">
                    <ul class="nav pl-4">
                        <li class="active ">
                            <a href="{{ route('user.index')}} ">
                                <i class="fas fa-users"></i>
                                <p>Usuários</p>
                            </a>
                        </li>

                        <li class="active">
                            <a href=" {{route('roles.index')}} ">
                                <i class="fas fa-user-lock"></i>
                                <p>Atribuições</p>
                            </a>
                        </li>

                        <li class="active">
                            <a href="{{ route('permissions.index') }}">
                                <i class="fas fa-lock"></i>
                                <p>Permissões</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
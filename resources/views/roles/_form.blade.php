<div class="row">
    <div class="col-md-12">
        {!!Form::text('name', 'Nome')!!}
    </div>

    @isset ($permissions) 
        <div class="col-md-12">
            <p>Permissões</p>
        </div>
        <div class="col-md-12">
            @foreach ($permissions as $permission)
                <div class="col">
                    <input type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>
    @endisset
    
    <div class="col-md-12">
        {!!Form::submit('Salvar')!!}
    </div>
</div>
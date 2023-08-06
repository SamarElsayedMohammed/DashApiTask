    <div class="form-group">
        {{-- @dd($permission) --}}
        @foreach ($rolePermissions as $permission)
            <div class="form-check">
                <input type="checkbox" name="permissions[]" class="form-check-input" id="exampleCheck1"
                    value="{{ $permission->id }}">
                <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
            </div>
        @endforeach
    </div>

 <div class="form-group">
     @foreach ($permissions as $permission)
         <div class="form-check">
             <input type="checkbox" name="permission[]" class="form-check-input" id="exampleCheck1"
                 value="{{ $permission->id }}" @checked(in_array($permission->id, $rolePermissions))>
             <label class="form-check-label" for="exampleCheck1">{{ $permission->name }}</label>
         </div>
     @endforeach
 </div>

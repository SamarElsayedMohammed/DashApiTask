<div class="card-body">
    <div class="form-group">
        <x-dashboard.inputs.input type="text" class="form-control" id="name" name="name" placeholder="name"
            id="name" label='true' labelName='name' value="{{ $user->name }}" required />
    </div>
    <div class="form-group">
        <x-dashboard.inputs.input type="text" class="form-control" id="email" name="email"
            placeholder="Email Address" id="email" label='true' labelName='Email Address'
            value="{{ $user->email }}" required />
    </div>
    <div class="form-group">
        <x-dashboard.inputs.input type="text" class="form-control" id="password" name="password"
            placeholder="Password" id="password" label='true' labelName='Password ' />
    </div>
    <div class="form-group">
        <x-dashboard.inputs.input type="text" class="form-control" id="confirm-password" name="confirm-password"
            placeholder="confirm password" id="confirm-password" label='true' labelName='confirm-password' />
    </div>
    <div class="form-group">
        <select class="form-control" name="roles" id="">
            @foreach ($roles as $role)
                <option value="{{ $role->name }}"
                    @isset($userRole)
                    @selected($role->name ==  $userRole->name )@endisset>
                    {{ $role->name }}</option>
            @endforeach

        </select>
    </div>


</div>

<div class="card-body">
    <div class="form-group">
        <x-dashboard.inputs.input type="text" class="form-control" id="name" name="name" placeholder=" role name"
            id="name" label='true' labelClass="form-check-label" labelName='Role Name' value="{{ $role->name }}"
            required />
    </div>

    <x-dashboard.permission-select-box :rolePermissions="$rolePermissions" />

</div>

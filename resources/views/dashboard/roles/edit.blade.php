<x-dashboard.admin-layout title="Update User">
    <x-slot name="contentHeader">
        <x-dashboard.includes.content-header pageTitle="Edit Role">
            <li class="breadcrumb-item active">Edit Role</li>
        </x-dashboard.includes.content-header>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Role</div>
            <div class="card-body">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $role->id }}">
                    @include('dashboard.roles._form');
                    <x-dashboard.inputs.form-actions name="update" />
                </form>
            </div>
        </div>
    </div>

</x-dashboard.admin-layout>

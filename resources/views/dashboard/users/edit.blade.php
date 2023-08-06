<x-dashboard.admin-layout title="Update User">
    <x-slot name="contentHeader">
        <x-dashboard.includes.content-header pageTitle="Edit User">
            <li class="breadcrumb-item active">Edit Users</li>
        </x-dashboard.includes.content-header>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @include('dashboard.users._form');
                    <x-dashboard.inputs.form-actions name="update" />
                </form>
            </div>
        </div>
    </div>

</x-dashboard.admin-layout>

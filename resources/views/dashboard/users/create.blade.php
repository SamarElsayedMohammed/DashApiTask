<x-dashboard.admin-layout title="home page">
    <x-slot name="contentHeader">
        <x-dashboard.includes.content-header pageTitle="Starter Page">
            <li class="breadcrumb-item active">New Users</li>
        </x-dashboard.includes.content-header>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">Create New User</div>
            <div class="card-body">
                <form action="{{route('admin.users.store')}}" method="POST">
                    @csrf
                @include("dashboard.users._form");
                  <x-dashboard.inputs.form-actions />
                </form>
            </div>
        </div>
    </div>

</x-dashboard.admin-layout>



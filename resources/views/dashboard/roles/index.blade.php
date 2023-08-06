<x-dashboard.admin-layout title="home page">
    <x-slot name="contentHeader">
        <x-dashboard.includes.content-header pageTitle="Starter Page">
            <li class="breadcrumb-item active">Roles</li>
        </x-dashboard.includes.content-header>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Roles</div>
            <x-dashboard.inputs.alert type="success" />
            <x-dashboard.inputs.alert type="danger" />
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
</x-dashboard.admin-layout>

@extends('admin.layouts.livewire-table-container')

@section('livewire-table')

    <livewire:client.client-table/>
    @livewire('livewire-ui-modal')

@endsection


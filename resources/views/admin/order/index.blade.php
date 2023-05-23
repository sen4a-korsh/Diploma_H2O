@extends('admin.layouts.livewire-table-container')

@section('livewire-table')

    <livewire:order.order-table/>
    @livewire('livewire-ui-modal')

@endsection


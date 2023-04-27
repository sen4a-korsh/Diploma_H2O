@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 90%">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card-title text-center mt-3 mb-3">
                        <h1 class="fs-2">{{ (isset($name_table)) ? $name_table : '' }} Table</h1>
                    </div>
                    @yield('livewire-table')
                </div>
            </div>
        </div>
    </div>

@endsection


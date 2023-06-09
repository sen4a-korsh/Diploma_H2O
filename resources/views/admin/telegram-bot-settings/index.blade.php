@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="width: 60%">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-5 bg-white border-b border-gray-200">
                    <div class="card-title text-center mt-3 mb-3">
                        <h1 class="fs-2">Settings</h1>
                    </div>

                    <form action=" {{ route('telegram-bot-settings.store') }}" method="post">
                        @csrf
                        <div class="">
                            @if(Session::has('status'))
                            <div class="alert alert-info text-break">
                                <span>{{ Session::get('status') }}</span>
                            </div>
                            @endif
                            <label>Url callback для TelegramBot:</label>
                            <div class="input-group mt-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'">Paste url</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit()">Send url</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit()">Get url</a></li>
                                </ul>
                                <input type="url" class="form-control" id="url_callback_bot" name="url_callback_bot"
                                       placeholder="Enter URL" value="{{ $url_callback_bot ?? '' }}">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-primary" style="width: 100px" type="submit">Save</button>
                        </div>
                    </form>

                    <form id="setwebhook" action="{{ route('telegram-bot-settings.setwebhook') }}" method="post" style="display: none">
                        @csrf
                        <input type="hidden" name="url" value="{{ $url_callback_bot ?? '' }}">
                    </form>

                    <form id="getwebhookinfo" action="{{ route('telegram-bot-settings.getwebhookinfo') }}" method="post" style="display: none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

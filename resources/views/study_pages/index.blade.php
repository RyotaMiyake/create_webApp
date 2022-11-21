<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Study Page') }}
        </h2>
    </x-slot>
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2><学習時間記録></h2>
                    <form action="/studytime/{{ Auth::user()->id }}" method="POST">
                        @csrf
                        <div>
                            <h2>資格名</h2>
                            <select name="studytime[certification_id]">
                                @foreach($certifications as $certification)
                                    <option value="{{ $certification->id }}">{{ $certification->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="date">
                            <h2>開始日時</h2>
                            <input type="datetime-local" name="studytime[started_at]" value="{{ old('studytime.started_at') }}"/>
                            <p class="datetime__error" style="color:red">{{ $errors->first('studytime.started_at') }}</p>
                        </div>
                        <div class="date">
                            <h2>終了日時</h2>
                            <input type="datetime-local" name="studytime[ended_at]" value="{{ old('studytime.ended_at') }}"/>
                            <p class="datetime__error" style="color:red">{{ $errors->first('studytime.ended_at') }}</p>
                        </div>
                        <x-primary-button class="ml-3">
                            {{ __('記録') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200">
                    <p class="target">[<a href="/studytime/{{ Auth::user()->id }}/target">目標設定</a>]</p>
                </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</x-app-layout>
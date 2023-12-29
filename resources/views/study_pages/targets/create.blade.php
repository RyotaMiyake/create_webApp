<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('目標設定') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <body>
                        <p class="text-lg font-bold">目標設定</p>
                        <div class="content">
                            <form action="/studytime/{{ Auth::user()->id }}/target" method="POST">
                                @csrf
                                <div>
                                    <h2>資格名</h2>
                                    <select name="target[certification_id]">
                                        @foreach($certifications as $certification)
                                            <option value="{{ $certification->id }}">{{ $certification->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="date">
                                    <h2>日時</h2>
                                    <input type="date" name="target[completion_date]" value="{{ old('target.completion_date') }}"/>
                                    <p class="date__error" style="color:red">{{ $errors->first('target.completion_date') }}</p>
                                </div>
                                <div class='studytime'>
                                    <h2>勉強時間</h2>
                                    <input type='number' min=0 name='target[completion_studytime]' value="{{ old('target.completion_studytime') }}">時間 
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('設定') }}</button>
                                    <p class="studytime__error" style="color:red">{{ $errors->first('target.completion_studytime') }}</p>
                                </div>
                            </form>
                            <button class="bg-white bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                <a href="/studytime/{{ Auth::user()->id }}">戻る</a>
                            </button>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
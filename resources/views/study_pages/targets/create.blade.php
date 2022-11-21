<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <body>
                        <h1 class="title">目標設定画面</h1>
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
                                    <p class="studytime__error" style="color:red">{{ $errors->first('target.completion_studytime') }}</p>
                                </div>
                                <x-primary-button class="ml-3">
                                    {{ __('設定') }}
                                </x-primary-button>
                            </form>
                            <div class="footer">
                                <a href="/studytimes/{{ Auth::user()->id }}">戻る</a>
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
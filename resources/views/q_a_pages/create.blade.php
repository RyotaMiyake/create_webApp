<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('質問作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <body>
                        <p class="text-lg font-bold">質問作成</p>
                        <div class="content">
                            <form action="/questions" method="POST">
                                @csrf
                                <div class="title">
                                    <h2>タイトル</h2>
                                    <input type="text" name="question[title]" placeholder="タイトル" value="{{ old('thread.title') }}"/>
                                    <p class="title__error" style="color:red">{{ $errors->first('thread.title') }}</p>
                                </div>
                                <div class="comment">
                                    <h2>内容</h2>
                                    <textarea name="question[body]" placeholder="内容">{{ old('question.body') }}</textarea>
                                    <p class="title__error" style="color:red">{{ $errors->first('question.body') }}</p>
                                </div>
                                <div>
                                    <h2>資格名</h2>
                                    <select name="question[certification_id]">
                                        @foreach($certifications as $certification)
                                            <option value="{{ $certification->id }}">{{ $certification->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('作成') }}</button>
                                </div>
                            </form>
                            <button class="bg-white bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                <a href="/questions">戻る</a>
                            </button>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
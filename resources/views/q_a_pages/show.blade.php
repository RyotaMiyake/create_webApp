<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">質問</p>
                    <div class='question'>
                        <h2> {{ $question->title }} </h2>
                        <h2> {{ $question->body }} </h2>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                　　<h2 class="text-lg font-bold">回答一覧</h2>
                    <div class='answers'>
                        @foreach ($answers as $answer)
                            @if($answer->question_id == $question->id)
                                <div class='answer'>
                                    <h2 class='body'>
                                        {{ $answer->body }} &ensp; (投稿者:{{ $answer->user->name }}) &ensp; (投稿日:{{ $answer->created_at }})
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/questions/{{ $question->id }}" method="POST">
                        @csrf
                        <div class="answer">
                            <h2 class="text-lg font-bold">返信コメント</h2>
                            <textarea name="answer[body]" placeholder="返信コメント">{{ old('answer.body') }}</textarea>
                            <p class="body__error" style="color:red">{{ $errors->first('answer.body') }}</p>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('投稿') }}</button>
                    </form>
                    <button class="bg-white bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        <a href="/questions">戻る</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
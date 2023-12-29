<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A') }}
        </h2>
        <!-- CSS記述 -->
        <style>
            .left, .right {
              display: inline-block;
            }
            .frame {
              display: flex;
              justify-content: space-between;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        <a href="/questions/create">質問作成</a>
                    </button>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">スレッド一覧</p>
                    <div class='questions'>
                        @foreach ($questions as $question)
                            <div class='question'>
                                <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                <h2 class='title'>
                                    <a href="/questions/{{ $question->id }}">
                                        {{ $question->title }}
                                        <h2 class='body'>
                                        <div class="frame">
                                            <span class="left"> {{ $question->body }} </span>
                                            <span class="right"> (作成者:{{ $question->user->name }}) &ensp; (作成日:{{ $question->created_at }}) </span>
                                        </div>
                                        </h2>
                                    </a>
                                </h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class='paginate'>
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

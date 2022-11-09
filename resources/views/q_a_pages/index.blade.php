<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Q&A Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ Auth::user()->name }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    This is Q&A Page!!
                    <p class="create">[<a href="/questions/create">質問作成</a>]</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    スレッド一覧
                    <div class='questions'>
                        @foreach ($questions as $question)
                            <div class='question'>
                                <h2 class='title'>
                                    <a href="/questions/{{ $question->id }}">
                                        {{ $question->title }} &ensp; (作成者:{{ $question->user->name }}) &ensp; (作成日:{{ $question->created_at }})
                                    </a>
                                </h2>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

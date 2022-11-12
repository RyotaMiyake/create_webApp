<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Top Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <!-- 新着スレッド（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class='threads'>新着スレッド</p> 
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            <div class='thread'>
                                <h2 class='title'>
                                    <a href="/threads/{{ $thread->id }}">
                                        {{ $thread->title }} &ensp; (作成日:{{ $thread->created_at }})
                                    </a>
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 新着質問（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class='questions'>新着質問</p>  
                    <div class='questions'>
                        @foreach ($questions as $question)
                            <div class='question'>
                                <h2 class='title'>
                                    <a href="/questions/{{ $question->id }}">
                                        {{ $question->title }} &ensp; (作成日:{{ $question->created_at }})
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

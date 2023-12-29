<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('トップページ') }}
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
            <!-- 新着スレッド（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">新着スレッド</p> 
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            <div class='thread'>
                                <h2 class='title'>
                                    <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                        <a href="/threads/{{ $thread->id }}">
                                            <div class="frame">
                                                <span class="left"> {{ $thread->title }}</span>
                                                <span class="right"> (作成日:{{ $thread->created_at }})</span>
                                            </div>
                                        </a>
                                    </div>
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 新着質問（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">新着質問</p>  
                    <div class='questions'>
                        @foreach ($questions as $question)
                            <div class='question'>
                                <h2 class='title'>
                                    <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                        <a href="/questions/{{ $question->id }}">
                                            <div class="frame">
                                                <span class="left"> {{ $question->title }} </span>
                                                <span class="right"> (作成日:{{ $question->created_at }}) </span>
                                            </div>
                                        </a>
                                    </div>
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

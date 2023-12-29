<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
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
            <!-- 自己紹介 -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    名前 : {{ $user->name }}
                    <br>
                    自己紹介 : {{ $user->self_introduction }}
                    <br>
                    年齢 : {{ $user->age }}
                    <br>
                    職業 : {{ $user->job->name }}
                    <div align="right">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            <a href="/mypage/{{ Auth::user()->id }}/edit">編集</a>
                        </button>
                    </div>
                </div>
            </div>
            <!-- 作成したスレッド一覧（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">作成スレッド</p> 
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            @if ($thread->user_id == $user->id)
                                <div class='thread' style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                    <h2 class='title'>
                                        <div class="frame">
                                            <span class="left"> {{ $thread->title }} </span>
                                            <span class="right"> (作成日:{{ $thread->created_at }}) </span>
                                        </div>
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 作成したコメント一覧（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">投稿コメント</p>  
                    <div class='comments'>
                        @foreach ($comments as $comment)
                            @if ($comment->user_id == $user->id)
                                <div class='comment' style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                    <h2 class='body'>
                                        <div class="frame">
                                            <span class="left"> (投稿スレッド:{{ $comment->thread->title }}) &ensp; {{ $comment->body }} </span>
                                            <span class="right"> (作成日:{{ $comment->created_at }}) </span>
                                        </div>
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 作成した質問一覧（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">作成質問</p>  
                    <div class='questions'>
                        @foreach ($questions as $question)
                            @if ($question->user_id == $user->id)
                                <div class='question' style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                    <h2 class='title'>
                                        <div class="frame">
                                            <span class="left"> {{ $question->title }} </span>
                                            <span class="right"> (作成日:{{ $question->created_at }}) </span>
                                        </div>
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- 作成した解答一覧（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">回答コメント</p>  
                    <div class='answers'>
                        @foreach ($answers as $answer)
                            @if ($answer->user_id == $user->id)
                                <div class='answer' style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                    <h2 class='title'>
                                        <div class="frame">
                                            <span class="left"> (質問:{{ $answer->question->title }}) &ensp; {{ $answer->body }} </span>
                                            <span class="right"> (作成日:{{ $answer->created_at }}) </span>
                                        </div>
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- 自己紹介 -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class='body'>{{ $user->name }}</p>
                    Name1 : {{ $user->name }}
                    <br>
                    Introduction : {{ $user->self_introduction }}
                    <br>
                    Age : {{ $user->age }}
                    <br>
                    Job : {{ $user->job->name }}
                    <p class="edit">[<a href="/mypage/{{ Auth::user()->id }}/edit">edit</a>]</p>
                </div>
            </div>
            <!-- 作成したスレッド一覧（最新5件） -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class='threads'>作成スレッド</p> 
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            @if ($thread->user_id == $user->id)
                                <div class='thread'>
                                    <h2 class='title'>
                                        {{ $thread->title }} &ensp; (作成日:{{ $thread->created_at }})
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
                    <p class='comments'>投稿コメント</p>  
                    <div class='comments'>
                        @foreach ($comments as $comment)
                            @if ($comment->user_id == $user->id)
                                <div class='comment'>
                                    <h2 class='body'>
                                        (投稿スレッド:{{ $comment->thread->title }}) &ensp; {{ $comment->body }} &ensp; (作成日:{{ $comment->created_at }})
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
                    <p class='questions'>作成質問</p>  
                    <div class='questions'>
                        @foreach ($questions as $question)
                            @if ($question->user_id == $user->id)
                                <div class='question'>
                                    <h2 class='title'>
                                        {{ $question->title }} &ensp; (作成日:{{ $question->created_at }})
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
                    <p class='answers'>作成質問</p>  
                    <div class='answers'>
                        @foreach ($answers as $answer)
                            @if ($answer->user_id == $user->id)
                                <div class='answer'>
                                    <h2 class='title'>
                                        (質問:{{ $answer->question->title }}) &ensp; {{ $answer->body }} &ensp; (作成日:{{ $answer->created_at }})
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thread Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $thread->title }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/threads/{{ $thread->id }}" method="POST">
                        @csrf
                        <div class="comment">
                            <h2>コメント</h2>
                            <textarea name="comment[body]" placeholder="内容">{{ old('comment.body') }}</textarea>
                            <p class="title__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                        </div>
                        <input type="submit" value="投稿"/>
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                　　コメント一覧
                    <div class='comments'>
                        @foreach ($comments as $comment)
                            @if($comment->thread_id == $thread->id)
                                <div class='comment'>
                                    <h2 class='title'>
                                        {{ $comment->body }} &ensp; (投稿者:{{ $comment->user->name }}) &ensp; (投稿日:{{ $comment->created_at }})
                                    </h2>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="footer">
                    <a href="/threads">戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

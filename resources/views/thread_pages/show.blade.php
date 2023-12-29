<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('スレッド詳細') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">スレッド名：{{ $thread->title }}</p>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                　　<p class="text-lg font-bold">コメント一覧</p>
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
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/threads/{{ $thread->id }}" method="POST">
                        @csrf
                        <div class="comment">
                            <p class="text-lg font-bold">コメント</p>
                            <textarea name="comment[body]" placeholder="内容">{{ old('comment.body') }}</textarea>
                            <p class="title__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('投稿') }}</button>
                    </form>
                    <button class="bg-white bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        <a href="/threads">戻る</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

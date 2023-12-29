<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('掲示板') }}
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
                    <form action="/threads" method="POST">
                        @csrf
                        <div class="title">
                            <p class="text-lg font-bold">スレッド名</p>
                            <input type="text" name="thread[title]" placeholder="タイトル" value="{{ old('thread.title') }}"/> 
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('作成') }}</button>
                            <p class="title__error" style="color:red">{{ $errors->first('thread.title') }}</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-lg font-bold">スレッド一覧</p>
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            <div class='thread'>
                                <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                                <h2 class='title'>
                                    <a href="/threads/{{ $thread->id }}">
                                        <div class="frame">
                                            <span class="left"> {{ $thread->title }} </span>
                                            <span class="right"> (作成者:{{ $thread->user->name }}) &ensp; (作成日:{{ $thread->created_at }}) </span>
                                        </div>
                                    </a>
                                </h2>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class='paginate'>
                        {{ $threads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

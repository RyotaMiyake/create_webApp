<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Threads Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ Auth::user()->name }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    This is Threads Page!!
                    <form action="/threads" method="POST">
                        @csrf
                        <div class="title">
                            Thread Title
                            <input type="text" name="thread[title]" placeholder="タイトル" value="{{ old('thread.title') }}"/>
                            <p class="title__error" style="color:red">{{ $errors->first('thread.title') }}</p>
                        </div>
                        <x-primary-button class="ml-3">
                            {{ __('作成') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    スレッド一覧
                    <div class='threads'>
                        @foreach ($threads as $thread)
                            <div class='thread'>
                                <h2 class='title'>
                                    <a href="/threads/{{ $thread->id }}">
                                        {{ $thread->title }} &ensp; (作成者:{{ $thread->user->name }}) &ensp; (作成日:{{ $thread->created_at }})
                                    </a>
                                </h2>
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

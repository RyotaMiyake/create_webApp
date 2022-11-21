<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit My Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <body>
                        <h1 class="title">編集画面</h1>
                        <div class="content">
                            <form action="/mypage/{{ $user->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="name">
                                    <h2>名前</h2>
                                    <input type="text" name="user[name]" value="{{ $user->name }}"/>
                                    <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                                </div>
                                
                                <div class="introduction">
                                    <h2>自己紹介</h2>
                                    <input type="text" name="user[self_introduction]" value="{{ $user->self_introduction }}"/>
                                    <p class="introduction__error" style="color:red">{{ $errors->first('user.self_introduction') }}</p>
                                </div>
                                <div class='age'>
                                    <h2>年齢</h2>
                                    <input type='number' min=0 max=150 name='user[age]' value="{{ $user->age }}">
                                    <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
                                </div>
                                <div>
                                    <h2>職業</h2>
                                    <select name="user[job_id]">
                                        @foreach($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-primary-button class="ml-3">
                                    {{ __('保存') }}
                                </x-primary-button>
                            </form>
                            <div class="footer">
                                <a href="/mypage/{{ $user->id }}">戻る</a>
                            </div>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
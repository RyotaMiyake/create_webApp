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
                                    <h2>Name</h2>
                                    <input type="text" name="user[name]" value="{{ $user->name }}"/>
                                    <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                                </div>
                                
                                <div class="introduction">
                                    <h2>Introduction</h2>
                                    <input type="text" name="user[self_introduction]" value="{{ $user->self_introduction }}"/>
                                    <p class="introduction__error" style="color:red">{{ $errors->first('user.self_introduction') }}</p>
                                </div>
                                
                                <div class='age'>
                                    <h2>Age</h2>
                                    <input type='number' name='user[age]' value="{{ $user->age }}">
                                    <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
                                </div>
                                <input type="submit" value="保存"/>
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
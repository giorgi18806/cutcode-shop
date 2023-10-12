@extends('layouts.auth')

@section('title', 'Вход в аккаунт')

@section('content')
    <div class="max-w-[640px] mt-12 mx-auto p-6 xs:p-8 md:p-12 2xl:p-16 rounded-[20px] bg-purple">
        <h1 class="mb-5 text-lg font-semibold">Вход в аккаунт</h1>

        <form class="space-y-3">
            <x-forms.text-input type="email" placeholder="Email" required></x-forms.text-input>

            <input type="password" class="w-full h-14 px-4 rounded-lg border border-[#A07BF0] bg-white">
            <button type="submit" class="w-full btn btn-pink">Войти</button>
        </form>
        <ul class="space-y-3 my-2">
            <li>
                <a href="#" class="relative flex items-center h-14 px-12 rounded-lg border border-[#A07BF0]">
                    <svg class="shrink-0 absolute left-4 w-5 sm:w-6 h-5 sm:h-6">

                    </svg>
                    <span class="grow text-xxs md:text-xs font-bold text-center">Github</span>
                </a>
            </li>
        </ul>
        <div class="space-y-3 mt-5">
            <div class="text-xxs md:text-xs"><a href="#" class="text-white hover:text-grey">Забыли пароль</a></div>
            <div class="text-xxs md:text-xs"><a href="#" class="text-white hover:text-white-200">Регистрация</a></div>
        </div>
        <ul class="flex flex-col md:flex-row justify-between gap-3 md:gap-4 mt-14 md:mt-20">

        </ul>
    </div>
@endsection

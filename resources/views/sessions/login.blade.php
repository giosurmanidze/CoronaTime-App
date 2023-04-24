<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-3/5 h-screen flex justify-center md:justify-start lg:ml-10  items-center w-full">
                <form method="POST" action="{{ route('store-login') }}"
                    class="w-full max-w-md px-4 md:ml-10 flex flex-col md:gap-2 gap-4">
                    @csrf

                    <div class="flex justify-between">
                        <img src="images/Group 1.jpg" class="w-[150px] mb-3" />
                        <div class="text-black flex items-center cursor-pointer">
                            <select id="language-select" onchange="window.location.href = this.value;">
                                <option value="{{ route('store-login', ['language' => 'en']) }}"
                                    {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                                <option value="{{ route('store-login', ['language' => 'ka']) }}"
                                    {{ app()->getLocale() === 'ka' ? 'selected' : '' }}>{{ __('Georgian') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-8">
                        <h1 class="text-xl text-[#010414] font-black">{{ __('title_login_page') }}</h1>
                        <p class="text-[#808189] text-md mt-1">{{ __('info_login_page') }}</p>
                    </div>
                    <div class="2xl:mt-3 relative">
                        <label class="block text-[#010414] font-bold mb-2" for="username">
                            {{ __('user_name') }}
                        </label>
                        <input
                            class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old('username')) && !$errors->has('username')) border-green-500 @endif @if ($errors->has('username')) border-red-500 @endif"
                            id="username" type="text" name="username" placeholder="{{ __('login_username') }}"
                            value="{{ old('username') ?: request()->cookie('remember_token') ?? '' }}">
                        @if (!empty(old('login')) && !$errors->has('username'))
                            <img class="absolute right-1 top-12" src="images/checkbox-circle-fill.jpg" />
                        @endif
                        @if ($errors->has('username'))
                            <div class="flex items-center">
                                <img src="images/error-warning-fill.jpg" width="20" class="mt-3" />
                                <p class="text-red-500 text-xs italic mt-2 ml-2">{{ $errors->first('username') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="2xl:mt-3 relative">
                        <label class="block text-[#010414] font-bold mb-2" for="password">
                            {{ __('Password') }}
                        </label>
                        <input
                            class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old('password')) && !$errors->has('password')) border-green-500 @endif @if ($errors->has('password')) border-red-500 @endif"
                            id="password" type="password" name="password" placeholder="{{ __('for_password') }}"
                            value="{{ old('password') ?: request()->cookie('remember_token_password') ?? '' }}">

                        @if (!empty(old('password')) && !$errors->has('password'))
                            <img class="absolute right-1 top-12" src="images/checkbox-circle-fill.jpg" />
                        @endif
                        @if ($errors->has('password'))
                            <div class="flex items-center">
                                <img src="images/error-warning-fill.jpg" width="20" class="mt-3" />
                                <p class="text-red-500 text-xs italic mt-2 ml-2">{{ $errors->first('password') }}</p>
                            </div>
                        @endif
                    </div>


                    <div class="mt-3 flex justify-between">
                        <div class="flex gap-2">
                            <input class="form-check-input w-[15px]"
                                {{ request()->cookie('remember_token') ? 'checked' : '' }} type="checkbox"
                                name="remember" id="remember" />
                            <label for="remember" class="text-sm text-[#010414] font-bold">{{ __('remember') }}</label>
                        </div>

                        <a class="text-sm w-full text-[#2029F3] font-bold flex justify-end"
                            href="{{ route('forgot-password') }}">{{ __('forgot_password_text') }}</a>
                    </div>
                    <div class="mt-4">
                        <button
                            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68]"
                            type="submit">
                            {{ __('login') }}
                        </button>
                    </div>
                    <div class="text-center mt-2">
                        {{ __('dont_have_acc') }} <strong><a href="/register"
                                class="text-black">{{ __('login_signup') }}</a></strong>
                    </div>
                </form>
            </div>
            <div class="md:w-2/5 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>
    </x-slot>
</x-layout>

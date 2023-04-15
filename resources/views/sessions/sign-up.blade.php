<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-2/3 h-screen flex justify-center items-center">
                <form method="POST" action="/register" class="w-full max-w-md px-4 flex flex-col md:gap-0 gap-4">
                    @csrf

                    <div class="flex justify-between">
                        <img src="images/Group 1.jpg" class="w-[150px] mb-3" />
                        <div class="text-black flex items-center cursor-pointer">
                            <select id="language-select" onchange="window.location.href = this.value;">
                                <option value="{{ route('register', ['language' => 'en']) }}"
                                    @if (app()->getLocale() == 'en') selected @endif>English</option>
                                <option value="{{ route('register', ['language' => 'ka']) }}"
                                    @if (app()->getLocale() == 'ka') selected @endif>Georgian</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-8">
                        <h1 class="text-xl text-[#010414] font-black">{{ __('title') }}</h1>
                        <p class="text-[#808189] text-md">{{ __('info') }}</p>
                    </div>
                    <x-Input-field type="text" name="name" error_name="name" label="user_name" placeholder="for_user" />
                    <x-Input-field type="text" name="email" error_name="email" label="Email" placeholder="for_email" />
                    {{-- <x-Input-field type="password" name="password"  label="Password" placeholder="for_password" />
                    <x-Input-field type="password" name="password_confirmation" label="conf_password"
                        placeholder="for_conf_password" /> --}}

                        <div class="2xl:mt-3 relative">
                            <label class="block text-[#010414] font-bold mb-2" for="password">
                                {{ __("Password") }}
                            </label>
                            <input
                                class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old("password")) && !$errors->has("password")) border-green-500 @else border-red-500 @endif"
                                id="password" type="password" name="password" placeholder="{{ __("for_password") }}"
                                value="{{ old("password") }}">
                            @if (!empty(old("password")) && !$errors->has("password"))
                                <img class="absolute right-1 top-12" src="images/checkbox-circle-fill.jpg" />
                            @else
                                @if ($errors->has("password"))
                                     <div class="flex items-center">
                                        <img src="images/error-warning-fill.jpg" width="20" class="mt-3" />
                                        <p class="text-red-500 text-xs italic mt-2 ml-2">{{  $errors->first("password") }}</p>
                                    </div> 
                                
                                @endif
                            @endif
                        </div>
                        <div class="2xl:mt-3 relative">
                            <label class="block text-[#010414] font-bold mb-2" for="password_confirmation">
                                {{ __("conf_password") }}
                            </label>
                            <input
                                class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old("password_confirmation")) && !$errors->has("password_confirmation")) border-green-500 @else border-red-500 @endif"
                                id="password_confirmation" type="password_confirmation" name="password_confirmation" placeholder="{{ __("for_conf_password") }}"
                                value="{{ old("password_confirmation") }}">
                            @if (!empty(old("password_confirmation")) && !$errors->has("password_confirmation"))
                                <img class="absolute right-1 top-12" src="images/checkbox-circle-fill.jpg" />
                            @else
                                @if ($errors->has("password_confirmation"))
                                    <div class="flex items-center">
                                        <img src="images/error-warning-fill.jpg" width="20" class="mt-3" />
                                        <p class="text-red-500 text-xs italic mt-2 ml-2">{{ $errors->first("password_confirmation") }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        


                    <div class="mt-3">
                        <input class="form-check-input" type="checkbox" name="remember_device" id="remember_device">
                        {{ __('remember') }}
                    </div>
                    <div class="mt-4">
                        <button name="register"
                            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68]"
                            type="submit">
                            {{ __('sign_up') }}
                        </button>
                    </div>
                    <div class="text-center mt-2">
                        {{ __('already_have') }} <strong><a href="/login"
                                class="text-black">{{ __('login') }}</a></strong>
                    </div>
                </form>
            </div>
            <div class="md:w-1/3 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>
    </x-slot>
</x-layout>

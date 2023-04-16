<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-3/5 h-screen flex justify-center md:justify-start lg:ml-10  items-center w-full">
                <form method="POST" action="/login" class="w-full max-w-md px-4 md:ml-10 flex flex-col md:gap-2 gap-4">
                    @csrf

                    <div class="flex justify-between">
                        <img src="images/Group 1.jpg" class="w-[150px] mb-3" />
                        <div class="text-black flex items-center cursor-pointer">
                            <select id="language-select" onchange="window.location.href = this.value;">
                                <option value="{{ route('login', ['language' => 'en']) }}"
                                    @if (app()->getLocale() == 'en') selected @endif>English</option>
                                <option value="{{ route('login', ['language' => 'ka']) }}"
                                    @if (app()->getLocale() == 'ka') selected @endif>Georgian</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-8">
                        <h1 class="text-xl text-[#010414] font-black">{{ __('title_login') }}</h1>
                        <p class="text-[#808189] text-md mt-1">{{ __('info_login') }}</p>
                    </div>
                    <x-Input-field type="text" name="login" label="Email or Username"
                        placeholder="Enter your email or username" :errors="$errors" />
                    <x-Input-field type="password" name="password" label="Password" placeholder="Enter your password"
                        :errors="$errors" />

                    <div class="mt-3 flex justify-between">
                        <div class="flex gap-2">
                            <input class="form-check-input w-[15px]" type="checkbox" name="remember_device"
                                id="remember_device">
                            <p class="text-sm text-[#010414] font-bold">{{ __('remember') }}</p>
                        </div>
                        <a class="text-sm w-full text-[#2029F3] font-bold flex justify-end"
                            href="#">{{ __('forgot_password') }}</a>
                    </div>
                    <div class="mt-4">
                        <button
                            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68]"
                            type="submit">
                            {{ __('login') }}
                        </button>
                    </div>
                    <div class="text-center mt-2">
                        {{ __('dont_have') }} <strong><a href="/register"
                                class="text-black">{{ __('login_sign_up') }}</a></strong>
                    </div>
                </form>
            </div>
            <div class="md:w-2/5 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>
    </x-slot>
</x-layout>

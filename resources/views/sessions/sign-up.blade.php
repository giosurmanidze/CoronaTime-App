<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-3/5 h-screen flex justify-center md:justify-start lg:ml-10  items-center w-full">
                <form method="POST" action="/register" class="w-full max-w-md px-4 md:ml-10 flex flex-col md:gap-2 gap-4 ">
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
                    <x-Input-field type="text" name="name" label="user_name" placeholder="for_user"
                        :errors="$errors" />
                    <x-Input-field type="text" name="email" label="Email" placeholder="for_email"
                        :errors="$errors" />
                    <x-Input-field type="password" name="password" label="Password" placeholder="for_password"
                        :errors="$errors" />
                    <x-Input-field type="password" name="password_confirmation" label="conf_password"
                        placeholder="for_conf_password" :errors="$errors" />
                    <div class="mt-3">
                        <input class="w-[15px] form-check-input" type="checkbox" name="remember_device" id="remember_device">
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
            <div class="md:w-2/5 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name="content">
        <div class="min-h-screen flex items-center justify-center flex-col">
            <img src="images/Group 1.jpg" class="absolute top-4" />
            <div class="flex flex-col items-center justify-center gap-10 px-4 sm:px-0 sm:max-w-md w-full">
                <h1 class="text-xl sm:text-3xl text-black"><strong>{{ __('reset') }}</strong></h1>

                <form method="POST" action="{{ route('password.update') }}"
                    class="w-full max-w-md px-4 md:ml-10 flex flex-col md:gap-10 gap-4">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <input type="hidden" name="email" value="{{ request()->query('email') }}">

                    <div class="relative w-full">
                        <label class="block text-[#010414] font-bold mb-2" for="password">
                            {{ __('new_pass') }}
                        </label>
                        <input
                            class="appearance-none border h-12 rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old('password')) && !$errors->has('password')) border-green-500 @endif @if ($errors->has('password')) border-red-500 @endif"
                            id="password" type="password" name="password" placeholder="{{ __('enter_new') }}">
                        @if (!empty(old('password')) && !$errors->has('password'))
                            <img class="absolute right-1 top-3" src="images/checkbox-circle-fill.jpg" />
                        @endif
                        @if ($errors->has('password'))
                            <div class="flex items-center mt-1">
                                <img src="images/error-warning-fill.jpg" width="20" class="mr-2" />
                                <p class="text-red-500 text-xs italic">{{ $errors->first('password') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="relative w-full">
                        <label class="block text-[#010414] font-bold mb-2" for="password_confirmation">
                            {{ __('repeat_pass') }}
                        </label>
                        <input
                            class="appearance-none border h-12 rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old('password_confirmation')) && !$errors->has('password_confirmation')) border-green-500 @endif @if ($errors->has('password_confirmation')) border-red-500 @endif"
                            id="password_confirmation" type="password" name="password_confirmation"
                            placeholder="{{ __('repeat_pass') }}">
                        @if (!empty(old('password_confirmation')) && !$errors->has('password_confirmation'))
                            <img class="absolute right-1 top-3" src="images/checkbox-circle-fill.jpg" />
                        @endif
                        @if ($errors->has('password_confirmation'))
                            <div class="flex items-center mt-1">
                                <img src="images/error-warning-fill.jpg" width="20" class="mr-2" />
                                <p class="text-red-500 text-xs italic">{{ $errors->first('password_confirmation') }}</p>
                            </div>
                        @endif
                    </div>

                    <button
                        class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68] text-sm"
                        type="submit">
                        {{ strtoupper(__('save')) }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>

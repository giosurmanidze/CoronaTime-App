<x-layout>
    <x-slot name="content">
        <div class="min-h-screen flex items-center justify-center flex-col">
            <img src="images/Group 1.jpg" class="absolute top-4" />
            <div class="flex flex-col items-center justify-center gap-10 px-4 sm:px-0 sm:max-w-md w-full">
                <h1 class="text-xl sm:text-3xl text-black"><strong>Reset Password</strong></h1>
                {{-- <x-Input-field type="text" name="email" label="Email" placeholder="for_email" :errors="$errors"/> --}}

                <form method="POST" action="/reset-email" class="w-full max-w-md px-4 md:ml-10 flex flex-col md:gap-10 gap-4">
                    @csrf
                    
                    <div class="relative w-full">
                        <label class="block text-[#010414] font-bold mb-2" for="email">
                            {{ __('Email') }}
                        </label>
                        <input
                            class="appearance-none border h-12 rounded w-full px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old('email')) && !$errors->has('email')) border-green-500 @endif @if ($errors->has('email')) border-red-500 @endif"
                            id="email" type="text" name="email" placeholder="{{ __('for_email') }}"
                            value="{{ old('email') }}">
                        @if (!empty(old('email')) && !$errors->has('email'))
                            <img class="absolute right-1 top-3" src="images/checkbox-circle-fill.jpg" />
                        @endif
                        @if ($errors->has('email'))
                            <div class="flex items-center">
                                <img src="images/error-warning-fill.jpg" width="20" class="mr-2" />
                                <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
                            </div>
                        @endif
                    </div>
                    <button
                        class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68] text-sm"
                        type="submit">
                        RESET PASSWORD
                    </button>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-2/3 h-screen flex justify-center items-center">
                <form method="POST" action="/register" class="w-full max-w-md px-4 flex flex-col md:gap-0 gap-4">
                    @csrf

                    <div class="flex justify-between">
                        <img src="images/Group 1.jpg" class="w-[150px] mb-3" />
                        <div class="text-black flex items-center cursor-pointer">English <img src="images/down-small.jpg"
                                class="w-[25px]" /></div>
                    </div>
                    <div class="mb-8">
                        <h1 class="text-xl text-[#010414] font-black">Welcome to Coronatime</h1>
                        <p class="text-[#808189] text-md">Please enter required info to sign up</p>
                    </div>
                    <x-Input-field type="text" name="name" label="Username" placeholder="Enter unique username" />
                    <x-Input-field type="text" name="email" label="Email" placeholder="Enter your email" />
                    <x-Input-field type="password" name="password" label="Password" placeholder="Fill in password" />
                    <x-Input-field type="password" name="password_confirmation" label="Repeat password"
                        placeholder="Repeat password" />
                    <div class="mt-3">
                        <input class="form-check-input" type="checkbox" name="remember_device" id="remember_device" {{ old('remember_device') ? 'checked' : '' }}>
                        Remember this device
                    </div>
                    <div class="mt-4">
                        <button name="register"
                            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68]"
                            type="submit">
                            Sign up
                        </button>
                    </div>
                    <div class="text-center mt-2">
                        Don’t have and account? <strong><a href="/login" class="text-black">Log in</a></strong>
                    </div>
                </form>
            </div>
            <div class="md:w-1/3 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>
    </x-slot>
</x-layout>

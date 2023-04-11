<x-layout>
    <x-slot name="content">
        <div class="flex flex-col md:flex-row h-screen">
            <div class="md:w-2/3 h-screen flex justify-center items-center">
                <form class="w-full max-w-md px-4 flex flex-col md:gap-0 gap-3">
                    <img src="images/Group 1.jpg" class="w-[150px] mb-3" />
                    <div class="mb-8">
                        <h1 class="text-xl text-[#010414] font-black">Welcome to Coronatime</h1>
                        <p class="text-[#808189] text-md">Please enter required info to sign up</p>
                    </div>
                    <x-Input-field name="username" label="Username" placeholder="Enter unique username" />
                    <x-Input-field name="email" label="Email" placeholder="Enter your email" />
                    <x-Input-field name="password" label="Password" placeholder="Fill in password" />
                    <x-Input-field name="confirm_password" label="Repeat password" placeholder="Repeat password" />
                    <div class="mb-2">
                        <input type="checkbox" />
                        Remember this device
                    </div>
                    <div class="mb-6">
                        <button
                            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full h-12 bg-[#0FBA68]"
                            type="button">
                            Sign up
                        </button>
                    </div>
                    <div class="text-center">
                        Don’t have and account? <span class="text-black">Log in</span>
                    </div>
                </form>
            </div>
            <div class="md:w-1/3 bg-gray-300 bg-cover bg-center flex-shrink-0"
                style="background-image: url('images/Rectangle 1.jpg');">
            </div>
        </div>

    </x-slot>
</x-layout>

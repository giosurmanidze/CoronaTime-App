<x-layout>
    <x-slot name="content">
        <div class="min-h-screen flex items-center justify-center flex-col">
            <img src="/images/Group 1.jpg" class="absolute top-4 w-30" />
            <div class="flex flex-col items-center justify-center gap-2">
                <img src="/images/icons8-checkmark.gif" />
                <p>{{ __('account_status') }}</p>
            </div>
            <a href="/login"
                class="mt-8 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline w-[350px] h-[50px] bg-[#0FBA68] cursor-pointer flex items-center justify-center">{{ __('sign_in') }}</a>
        </div>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name="content">
        <div>
            <div class="w-full">
                <div class="w-[90%] flex justify-between align-center m-auto h-[60px]">
                    <div class="flex items-center">
                        <img src="images/Group 1.jpg" class="w-[150px]" />
                    </div>
                    <div class="flex items-center sm:gap-[25px] xs:gap-3">
                        <div class="text-black flex items-center cursor-pointer">
                            <select id="language-select" class="cursor-pointer"
                                onchange="window.location.href = this.value;">
                                <option value="{{ route('landing-worldwide', ['language' => 'en']) }}"
                                    {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                                <option value="{{ route('landing-worldwide', ['language' => 'ka']) }}"
                                    {{ app()->getLocale() === 'ka' ? 'selected' : '' }}>{{ __('Georgian') }}</option>
                            </select>

                        </div>
                        <h1 class="border-r-[3px] pr-5 xs:hidden sm:block">User Name</h1>
                        <form method="POST" action="">
                            @csrf
                            <button type="submit" class="xs:hidden sm:flex">{{ __('logout') }}</button>
                        </form>
                        <x-burger-menu />
                    </div>
                </div>
                <div class="w-full h-[1px] bg-[#F6F6F7]"></div>
                <div class="w-[90%] flex flex-col justify-center m-auto h-[120px] gap-5">
                    <h1 class="text-xl"><strong>{{ __('WorldWide_title') }}</strong></h1>
                    <div class="flex gap-10 relative">
                        <div class="relative">
                            <a href="#">{{ __('WorldWide') }}</a>
                            @if (request()->is('landing-worldwide'))
                                <span class="w-[80px] h-[3px] bg-black absolute left-0 top-[35px] z-30"></span>
                            @endif
                        </div>
                        <a href='{{ route('search-country', ['language' => app()->getLocale()]) }}'>{{ __('by_country') }}</a>
                        <div class="h-[1px] bg-[#F6F6F7] w-full absolute top-9"></div>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 xs:grid-cols-2 w-[90%] m-auto gap-3 mt-6">
                <x-info-card img="card-1.svg" bg_color="bg-[#2029F3]" class="text-[#2029F3] md:col-span-1 xs:col-span-2"
                    title="new_cases" numbers="{{ $worldwideStatistics?->deaths }}"/>
                <x-info-card img="card-2.svg" bg_color="bg-[#0FBA68]" title="Recovered"
                    class="text-[#0FBA68] md:col-span-1" numbers="{{ $worldwideStatistics?->recovered }}"/>
                <x-info-card img="card-3.svg" bg_color="bg-[#EAD621]" title="Death"
                    class="text-[#EAD621] md:col-span-1" numbers="{{ $worldwideStatistics?->confirmed  }}"/>
            </div>
        </div>
    </x-slot>
</x-layout>

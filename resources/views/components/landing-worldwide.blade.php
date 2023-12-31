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
                        <h1 class="border-r-[3px] pr-5 xs:hidden sm:block">{{ auth()->user()->name }}</h1>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="xs:hidden sm:flex">{{ __('logout') }}</button>
                        </form>
                        <x-burger-menu />
                    </div>
                </div>
                <div class="w-full h-[1px] bg-[#F6F6F7]"></div>
                <div class="w-[90%] flex flex-col justify-center m-auto h-[120px] gap-5">
                    <h1 class="text-xl"><strong>{{ __('WorldWide_title') }}</strong></h1>
                    <div class="flex gap-10 relative {{ app()->getLocale() === 'ka' ? 'xs:text-[15px]' : '' }}">
                        <div class="relative flex gap-5 items-center">
                            <a href="{{ route('landing-worldwide', ['language' => app()->getLocale()]) }}"
                                class="{{ request()->is('landing-worldwide') ? 'border-b-[3px] border-black pb-[10px] z-20' : '' }}">{{ __('WorldWide') }}</a>
                            <a class="pb-[10px]"
                                href='{{ route('search-country', ['language' => app()->getLocale()]) }}'>{{ __('by_country') }}</a>
                        </div>
                        <div class="h-[1px] bg-[#F6F6F7] w-full absolute xs:top-9"></div>

                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-3 xs:grid-cols-2 w-[90%] m-auto gap-3 mt-6">
                <x-info-card img="card-1.svg" bg_color="bg-[#2029F3]" class="text-[#2029F3] md:col-span-1 xs:col-span-2"
                    title="new_cases" numbers="{{ $worldwideStatistics?->deaths }}" />
                <x-info-card img="card-2.svg" bg_color="bg-[#0FBA68]" title="Recovered"
                    class="text-[#0FBA68] md:col-span-1" numbers="{{ $worldwideStatistics?->recovered }}" />
                <x-info-card img="card-3.svg" bg_color="bg-[#EAD621]" title="Deaths"
                    class="text-[#EAD621] md:col-span-1" numbers="{{ $worldwideStatistics?->confirmed }}" />
            </div>
        </div>
    </x-slot>
</x-layout>

<x-layout>
    <x-slot name="content">
        <div>
            <div class="w-full">
                <div class="w-[90%] flex justify-between align-center m-auto h-[60px]">
                    <div class="flex items-center">
                        <img src="/images/Group 1.jpg" class="w-[150px]" />
                    </div>
                    <div class="flex items-center sm:gap-[25px] xs:gap-3">
                        <div class="text-black flex items-center cursor-pointer">


                            <select id="language-select" class="cursor-pointer"
                                onchange="window.location.href = this.value;">
                                <option value="{{ route('search-country', ['language' => 'en']) }}"
                                    {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                                <option value="{{ route('search-country', ['language' => 'ka']) }}"
                                    {{ app()->getLocale() === 'ka' ? 'selected' : '' }}>{{ __('Georgian') }}
                                </option>
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
                    <div class="flex gap-10 relative">
                        <div class="relative flex gap-5 items-center">
                            <a class="pb-[10px]"
                                href="{{ route('landing-worldwide', ['language' => app()->getLocale()]) }}">{{ __('WorldWide') }}</a>
                            <a class="{{ request()->is('statistics-by-country') ? 'border-b-[3px] border-black pb-[10px] z-20' : '' }}"
                                href="{{ route('search-country', ['language' => app()->getLocale()]) }}">{{ __('by_country') }}</a>
                        </div>
                        <div class="h-[1px] bg-[#F6F6F7] w-full absolute xs:top-9"></div>
                    </div>
                </div>
                <div class="w-[90%] m-auto mt-7">
                    <form method="GET" class="relative"
                        action="{{ route('search-country', ['language' => app()->getLocale()]) }}">
                        @csrf

                        <input name="search"
                            class="bg-[#FFFFFF] border-2 border-[#E6E6E7 rounded-lg h-12 w-[239px] pl-12"
                            placeholder="Search by country" value="{{ request('search') }}" />
                        <button type="submit">
                            <img src="/images/search.svg" alt="Search" class="top-4 left-4 absolute" />
                        </button>
                    </form>

                </div>
            </div>
            <div class="md:w-[90%] xs:w-full m-auto mt-7">
                <div class="w-full border-collapse border border-[#F6F6F7] rounded-lg">
                    <div class="w-full bg-[#F6F6F7] flex xs:justify-between md:justify-start">
                        <div
                            class="md:px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>{{ __('location') }}</strong>
                            <div>
                                <form method="GET"
                                    action="{{ route('search-country', ['language' => app()->getLocale()]) }}">
                                    @csrf
                                    <x-sorting-btn name="sort" />

                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[35%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>{{ __('new_cases') }}</strong>
                            <div>
                                <form method="GET"
                                    action="{{ route('search-country', ['language' => app()->getLocale()]) }}">
                                    @csrf

                                    <x-sorting-btn name="sort_by_cases" />

                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>{{ __('Deaths') }}</strong>


                            <div>
                                <form method="GET"
                                    action="{{ route('search-country', ['language' => app()->getLocale()]) }}">
                                    @csrf
                                    <x-sorting-btn name="sort_by_deaths" />

                                </form>

                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>{{ __('Recovered') }}</strong>
                            <div>
                                <form method="GET"
                                    action="{{ route('search-country', ['language' => app()->getLocale()]) }}">
                                    @csrf
                                    <x-sorting-btn name="sort_by_recovered" />

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="max-h-[60vh] overflow-y-auto">
                        <div>
                            @if (app()->getLocale() === 'en')
                                <x-info-column :data="$data" lang="en" />
                            @else
                                <x-info-column :data="$data" lang="ka" />
                            @endif
                        </div>
                    </div>
                </div>
    </x-slot>
</x-layout>

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
                                    {{ app()->getLocale() === 'en' ? 'selected' : '' }}
                                    >{{ __('English') }}
                                </option>
                                <option value="{{ route('search-country', ['language' => 'ka']) }}"
                                    {{ app()->getLocale() === 'ka' ? 'selected' : '' }}
                                    >{{ __('Georgian') }}
                                </option>
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
                            <a href="{{ route("landing-worldwide") }}">{{ __('WorldWide') }}</a>
                            @if (request()->is('landing-worldwide'))
                                <span class="w-[80px] h-[3px] bg-black absolute left-0 top-[35px] z-30"></span>
                            @endif
                        </div>
                        <a href="{{ route('search-country') }}">{{ __('by_country') }}</a>
                        <div class="h-[1px] bg-[#F6F6F7] w-full absolute top-9"></div>
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
                            class="px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>location</strong>
                            <div>
                                <form method="GET" action="{{ route('search-country', [app()->getLocale()]) }}">

                                    <x-sorting-btn name="sort" />

                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[35%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>New cases</strong>
                            <div>
                                <form method="GET" action="{{ route('search-country', [app()->getLocale()]) }}">

                                    <x-sorting-btn name="sort_by_cases" />

                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>Deaths</strong>
                            <div>
                                <form method="GET" action="{{ route('search-country', [app()->getLocale()]) }}">

                                    <x-sorting-btn name="sort_by_deaths" />

                                </form>
                            </div>
                        </div>
                        <div class="px-4 py-2 xs:w-[25%] xs:text-sm xs:px-2 md:w-[20%] flex items-center justify-start">
                            <strong>Recovered</strong>
                            <div>
                                <form method="GET" action="{{ route('search-country', [app()->getLocale()]) }}">

                                    <x-sorting-btn name="sort_by_recovered" />

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="max-h-[60vh] overflow-y-auto">
                        <div>
                            @if (app()->getLocale() === 'en')
                                @foreach ($data as $info)
                                    <div class="border-t border-[#F6F6F7] flex">
                                        <div
                                            class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
                                            {{ json_decode($info->name, true)['en'] }}
                                        </div>
                                        <div
                                            class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
                                            {{ $info->confirmed }}
                                        </div>
                                        <div
                                            class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
                                            {{ $info->deaths }}
                                        </div>
                                        <div
                                            class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
                                            {{ $info->recovered }}
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($data as $info)
                                    <div class="border-t border-[#F6F6F7] flex">
                                        <div class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
                                            {{ json_decode($info->name, true)['ka'] }}
                                        </div>
                                        <div class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">{{ $info->confirmed }}
                                        </div>
                                        <div class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">{{ $info->deaths }}
                                        </div>
                                        <div class="px-4 py-2 xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">{{ $info->recovered }}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
    </x-slot>
</x-layout>

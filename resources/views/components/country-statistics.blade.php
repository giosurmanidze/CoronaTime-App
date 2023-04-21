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
                                <option value="{{ route('statistics-by-country', ['language' => 'en']) }}"
                                    {{ app()->getLocale() === 'en' ? 'selected' : '' }}>{{ __('English') }}</option>
                                <option value="{{ route('statistics-by-country', ['language' => 'ka']) }}"
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
                            <a href="/landing-worldwide">{{ __('WorldWide') }}</a>
                            @if (request()->is('landing-worldwide'))
                                <span class="w-[80px] h-[3px] bg-black absolute left-0 top-[35px] z-30"></span>
                            @endif
                        </div>
                        <a href="/statistics-by-country">{{ __('by_country') }}</a>
                        <div class="h-[1px] bg-[#F6F6F7] w-full absolute top-9"></div>
                    </div>
                </div>
                <div class="w-[90%] m-auto mt-7">
                    <form method="POST" class="relative"
                        action="{{ route('search-country', ['language' => app()->getLocale()]) }}">

                        <input name="query"
                            class="bg-[#FFFFFF] border-2 border-[#E6E6E7 rounded-lg h-12 w-[239px] pl-12"
                            placeholder="Search by country"
                            value="{{ request()->is('statistics-by-country') ? '' : $query }}" />

                        <button type="submit">
                            <img src="/images/search.svg" alt="Search" class="top-4 left-4 absolute" />
                        </button>
                    </form>

                </div>
            </div>
            <div class="w-[90%] m-auto mt-7">
                <div>
                    <div class="w-full border border-[#F6F6F7] rounded-lg">
                        <div class="w-full bg-[#F6F6F7] ">
                            <div class="flex justify-around w-[80%]">

                                <div class="px-4 ml-[20px] py-2 flex items-center">
                                    <div>location</div>
                                    <div>
                                        <form action="POST" >
                                            <button type="submit">
                                                <img src="/images/arrow-drop-down-fill.svg" />
                                            </button>
                                            <button type="submit">
                                                <img src="/images/arrow-drop-down-fill2.svg" />
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="px-4 py-2">New cases</div>
                                <div class="px-4 py-2">Deaths</div>
                                <div class="px-4 py-2">Recovered</div>
                            </div>
                        </div>
                        <div class="max-h-[60vh] overflow-y-auto">
                            @if (app()->getLocale() === 'en')
                                @foreach ($data as $d)
                                    <div class="border-t border-[#F6F6F7] flex justify-around w-[80%]">
                                        <div class="px-4 py-2  flex justify-center">
                                            {{ json_decode($d->name, true)['en'] }}
                                        </div>
                                        <div class="px-4 py-2 text-center">{{ $d->confirmed }}</div>
                                        <div class="px-4 py-2 text-center">{{ $d->deaths }}</div>
                                        <div class="px-4 py-2 text-center">{{ $d->recovered }}</div>
                                    </div>
                                @endforeach
                            @else
                                @foreach ($data as $d)
                                    <div class="border-t border-[#F6F6F7] flex">
                                        <div class="px-4 py-2 flex justify-center">
                                            {{ json_decode($d->name, true)['ka'] }}
                                        </div>
                                        <div class="px-4 py-2 w-[20%] text-center">{{ $d->confirmed }}</div>
                                        <div class="px-4 py-2 w-[20%] text-center">{{ $d->deaths }}</div>
                                        <div class="px-4 py-2 w-[20%] text-center">{{ $d->recovered }}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>

@props(['data', 'lang'])

@foreach ($data as $info)
    <div
        class="border-t border-[#F6F6F7] flex {{ app()->getLocale() === 'ka' ? 'xs:text-[12px] sm:text-[14px]' : 'xs:text-[14px]' }}">
        <div
            class="px-4 py-2 {{ app()->getLocale() === 'ka' ? 'xs:px-1 md:px-4' : '' }} xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
            {{ json_decode($info->name, true)[$lang] }}
        </div>
        <div
            class="px-4 py-2 {{ app()->getLocale() === 'ka' ? 'xs:px-1 md:px-4' : '' }} xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
            {{ $info->confirmed }}
        </div>
        <div
            class="px-4 py-2 {{ app()->getLocale() === 'ka' ? 'xs:px-1 md:px-4' : '' }} xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
            {{ $info->deaths }}
        </div>
        <div
            class="px-4 py-2 {{ app()->getLocale() === 'ka' ? 'xs:px-1 md:px-4' : '' }} xs:w-[25%] md:w-[20%] flex justify-center flex-col items-start">
            {{ $info->recovered }}
        </div>
    </div>
@endforeach

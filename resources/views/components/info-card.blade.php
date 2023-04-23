@props(['class','img', 'bg_color',"title", 'numbers'])

<div class="h-[255px] rounded-2xl relative {{ $class }} flex flex-col items-center justify-center gap-3">
    <img src="/images/{{ $img }}"/>
    <h3 class="text-[#010414] text-base">{{ __($title) }}</h3>
   <strong class="text-3xl">{{ $numbers }}</strong>
    <div class="absolute inset-0 {{ $bg_color }} opacity-[.08] rounded-2xl"></div>
</div>

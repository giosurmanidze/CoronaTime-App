@props(['name', 'placeholder', 'label', 'type'])

<div class="2xl:mt-3">
    <label class="block text-[#010414] font-bold mb-2" for="{{ $name }}">
        {{ $label }}
    </label>
    <input class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}">
</div>

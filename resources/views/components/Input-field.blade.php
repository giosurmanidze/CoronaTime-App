@props(['name', 'placeholder', 'label', 'type', 'errors'])

<div class="2xl:mt-3 relative">
    <label class="block text-[#010414] font-bold mb-2" for="{{ $name }}">
        {{ __($label) }}
    </label>
    <input
        class="appearance-none border h-14 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @if (!empty(old($name)) && !$errors->has($name)) border-green-500 @endif @if ($errors->has($name)) border-red-500 @endif"
        id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ __($placeholder) }}"
        value="{{ old($name) }}">
    @if (!empty(old($name)) && !$errors->has($name))
        <img class="absolute right-1 top-12" src="images/checkbox-circle-fill.jpg" />
    @endif
    @if ($errors->has($name))
        <div class="flex items-center">
            <img src="images/error-warning-fill.jpg" width="20" class="mt-3" />
            <p class="text-red-500 text-xs italic mt-2 ml-2">{{ $errors->first($name) }}</p>
        </div>
    @endif
</div>

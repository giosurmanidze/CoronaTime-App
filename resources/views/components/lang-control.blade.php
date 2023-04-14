@props(['id', 'path_name', 'name'])

<div class="fixed left-0 top-1/2 transform -translate-y-1/2 p-8 flex flex-col justify-center gap-3">
    <div
        class="flex items-center justify-center w-9 h-9 rounded-[50%] border border-white {{ request()->language == 'en' ? 'bg-white text-black' : 'border-white text-white' }}">
        <a href="{{ route($path_name, [$name ?? 'name' => $id ?? 1, 'language' => 'en']) }}"
            class="text-center pb-1">en</a>
    </div>
    <div
        class="flex items-center justify-center w-9 h-9 rounded-[50%] border border-white {{ request()->language == 'ka' ? 'bg-white text-black' : 'border-white text-white' }}">
        <a href="{{ route($path_name, [$name ?? 'name' => $id ?? 1, 'language' => 'ka']) }}"
            class="text-center pb-1">ka</a>
    </div>
</div>
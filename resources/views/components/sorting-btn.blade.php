@props(["name"])

<input type="hidden" name="search" value="{{ request('search') }}">
<div class="flex flex-col justify-center pl-[4px]">
    <button type="submit" name="{{ $name }}" value="ascending">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 5.5L13 10.5L3 10.5L8 5.5Z"
                fill="{{ request($name) === 'ascending' ? '#000' : '#BFC0C4' }}" />
        </svg>

    </button>
    <button type="submit" name="{{ $name }}" value="descending">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 10.5L3 5.5H13L8 10.5Z"
                fill="{{ request($name) === 'descending' ? '#000' : '#BFC0C4' }}" />
        </svg>
    </button>
</div>

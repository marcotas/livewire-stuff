@props(['group', 'language'])

<div class="cursor-pointer rounded-lg p-4 bg-white hover:bg-gray-50 flex justify-between items-center"
    wire:key="language-{{ $group->id }}-{{ $language->id }}">
    <span>{{ $language->name }}</span>

    <button wire:click="removeLanguage({{ $language->id }})">
        <x-icon.x class="w-4 h-4 text-red-400 cursor-pointer hover:text-red-500" />
    </button>
</div>

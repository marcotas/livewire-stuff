<div {{ $attributes->merge([
    'class' => 'w-[300px] rounded-xl bg-gray-200 p-3',
]) }}>
    <div class="font-bold mb-3 flex justify-between space-x-3 flex-">
        <span>{{ $group->name }}</span>
        <x-icon.menu-alt class="w-4 h-4 text-black text-opacity-50 cursor-move" />
    </div>

    <div class="space-y-1 p-1 min-h-[150px]"
        group-id="{{ $group->id }}">
        @foreach ($group->programmingLanguages as $language)
            <x-card-item :group="$group" :language="$language" />
        @endforeach
    </div>
</div>

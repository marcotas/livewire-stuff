<div {{ $attributes->merge([
    'class' => 'w-[300px] rounded-xl bg-gray-200 p-3',
]) }}>
    <div class="font-bold mb-3 flex justify-between space-x-3 flex-">
        <span>{{ $group->name }}</span>
        <x-icon.menu-alt class="w-4 h-4 text-black text-opacity-50 cursor-move handler" />
    </div>

    <div class="space-y-1 p-1 min-h-[150px]"
        x-data=""
        group-id="{{ $group->id }}"
        x-init="Sortablejs.create($el, {
            animation: 150,
            group: 'group',
            onSort({ to }) {
                const groupId = to.getAttribute('group-id');
                const languageIds = Array.from(to.children).map(i => i.getAttribute('language-id'))
                @this.reorderLanguages({ groupId, languageIds });
            }
        })"
    >
        @foreach ($group->programmingLanguages as $language)
            <x-card-item language-id="{{ $language->id }}" :group="$group" :language="$language" />
        @endforeach
    </div>
</div>

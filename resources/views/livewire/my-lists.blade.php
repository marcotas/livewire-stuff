<div class="my-10">
    <h3 class="font-bold px-10 text-2xl text-gray-700 mb-6">My Lists</h3>

    <div class="px-10 pb-4 flex overflow-x-auto"
        x-data=""
        x-init="Sortablejs.create($el, {
            animation: 150,
            handle: '.handler',
            onSort({ to }) {
                const groupIds = Array.from(to.children).map(item => item.getAttribute('group-id'))
                @this.reorderGroups(groupIds);
            }
        })"
    >
        @foreach ($this->groups as $group)
            <x-group group-id="{{ $group->id }}" :group="$group" class="flex-shrink-0 mr-4" wire:key="groups-{{ $group->id }}" />
        @endforeach
    </div>
</div>

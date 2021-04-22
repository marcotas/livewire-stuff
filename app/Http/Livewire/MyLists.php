<?php

namespace App\Http\Livewire;

use App\Models\Group;
use App\Models\ProgrammingLanguage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

/**
 * @property-read Collection $groups
 */
class MyLists extends Component
{
    public function getGroupsProperty()
    {
        return Group::with([
            'programmingLanguages' => fn ($language) => $language->orderBy('position')
        ])->orderBy('position')->get();
    }

    public function reorderGroups($groupIds)
    {
        $groups = Group::query()->findMany($groupIds)
            ->map(function (Group $group) use ($groupIds) {
                $group->position = array_flip($groupIds)[$group->id];
                return $group;
            });
        Group::query()->upsert(
            $groups->toArray(),
            ['id'],
            ['position']
        );
    }

    public function reorderLanguages($params)
    {
        $groupId = $params['groupId'];
        $languageIds = $params['languageIds'];

        DB::transaction(function () use ($languageIds, $groupId) {
            ProgrammingLanguage::query()->findMany($languageIds)
                ->each(function (ProgrammingLanguage $programmingLanguage) use ($groupId, $languageIds) {
                    $programmingLanguage->position = array_flip($languageIds)[$programmingLanguage->id];
                    $programmingLanguage->group_id = $groupId;

                    $programmingLanguage->save();
                });
        });
    }

    public function render()
    {
        return view('livewire.my-lists');
    }
}

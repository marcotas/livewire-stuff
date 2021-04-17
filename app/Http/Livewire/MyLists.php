<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

/**
 * @property-read Collection $groups
 */
class MyLists extends Component
{
    public function getGroupsProperty()
    {
        return Group::with(['programmingLanguages'])->get();
    }

    public function render()
    {
        return view('livewire.my-lists');
    }
}

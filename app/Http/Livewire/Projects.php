<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selected_id;

    public $keyWord;

    public $name;

    public $priority;

    public $user_id;

    public function render()
    {
        $keyWord = '%'.$this->keyWord.'%';

        return view('livewire.projects.view', [
            'projects' => Project::latest()
                ->orWhere('name', 'LIKE', $keyWord)
                ->orWhere('priority', 'LIKE', $keyWord)
                ->orWhere('user_id', 'LIKE', $keyWord)
                ->orderBy('priority')
                ->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->name = null;
        $this->priority = null;
        $this->user_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Project::create([
            'name' => $this->name,
            'priority' => $this->priority,
            'user_id' => $this->user_id,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Project Successfully created.');
    }

    public function edit($id)
    {
        $record = Project::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->priority = $record->priority;
        $this->user_id = $record->user_id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Project::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'priority' => $this->priority,
                'user_id' => $this->user_id,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Project Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Project::where('id', $id)->delete();
        }
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Project::find($item['value'])->update(['priority' => $item['order']]);
        }
    }
}

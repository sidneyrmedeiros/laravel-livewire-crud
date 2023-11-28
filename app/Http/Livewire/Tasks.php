<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $selected_id;

    public $keyWord;

    public $name;

    public $priority;

    protected $tasks;

    public $projects;

    public $projectInput = [];

    protected $queryString = ['projectInput'];

    public function render()
    {
        $keyWord = '%'.$this->keyWord.'%';
        $this->projects = Project::all();
        $this->tasks = Task::latest()
            ->where(function ($query) use ($keyWord) { // aqui a abordagem
                $query->where('name', 'LIKE', $keyWord)
                    ->orWhere('priority', 'LIKE', $keyWord);
            })
            ->orderBy('priority');

        if ($this->projectInput) {
            $this->tasks->where('project_id', $this->projectInput);
        }

        return view('livewire.tasks.view', [
            'tasks' => $this->tasks->paginate(10),
            'projects' => $this->projects,
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
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Task::create([
            'name' => $this->name,
            'priority' => $this->priority,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
        session()->flash('message', 'Task Successfully created.');
    }

    public function edit($id)
    {
        $record = Task::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->priority = $record->priority;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Task::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'priority' => $this->priority,
            ]);

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
            session()->flash('message', 'Task Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Task::where('id', $id)->delete();
        }
    }

    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Task::find($item['value'])->update(['priority' => $item['order']]);
        }
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;

class Tasks extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $priority;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tasks.view', [
            'tasks' => Task::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('priority', 'LIKE', $keyWord)
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
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Task::create([ 
			'name' => $this-> name,
			'priority' => $this-> priority
        ]);
        
        $this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Task Successfully created.');
    }

    public function edit($id)
    {
        $record = Task::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->priority = $record-> priority;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Task::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'priority' => $this-> priority
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
}
<?php

namespace App\Livewire;

use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CandidateList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    #[On('candidate-saved')]
    public function refresh() {}


    public function delete($id)
    {
        $candidate = Candidate::findOrFail($id);

        Storage::disk('public')->delete($candidate->cv_path);

        $candidate->delete();

        session()->flash('success', 'Candidate deleted.');
    }

    public function render()
    {
        return view('livewire.candidate-list', [
            'candidates' => Candidate::latest()->paginate(10),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CvForm extends Component
{
    use WithFileUploads;

    #[Validate('required|string|min:2|max:100')]
    public $name = '';

    #[Validate('required|file|mimes:pdf,doc,docx,jpg,png|max:5120')] // 5 MB
    public $cv;

    public function save()
    {
        $this->validate();

        $path = $this->cv->storeAs('cvs',time() . '.' . $this->cv->getClientOriginalExtension(), 'public');

        Candidate::create([
            'name'    => $this->name,
            'cv_path' => $path,
        ]);

        $this->reset('name', 'cv');

        session()->flash('success', 'CV uploaded successfully.');


        $this->dispatch('candidate-saved');
    }

    public function render()
    {
        return view('livewire.cv-form');
    }
}

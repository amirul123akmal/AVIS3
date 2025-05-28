<?php

namespace App\Livewire;

use App\Models\RequestBeneficiary;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendDocuments extends Component
{
    use WithFileUploads;

    public $file;
    public $types;
    public $progress = 0;
    public $uploadStatus;
    public $title;
    public $multiple = false;

    public function mount()
    {
        $req = auth()->user()->actor->beneficiary;
        $result = RequestBeneficiary::where('benID', $req->benID)->value($this->types);
        if ($result != null) {
            $this->uploadStatus = 'File is saved, upload again to overwrite!';
        }
    }

    public function save()
    {
        $rules = [
            'file' => 'required|file|max:10240', // max 10MB for a single file
        ];

        if ($this->multiple) {
            $rules['file'] = 'required|array';
            $rules['file.*'] = 'file|max:10240';
        } else {
            $rules['file'] = 'required|file|max:10240'; // max 10MB single file
        }

        $this->validate($rules);
        $timestamp = time();
        if ($this->multiple) {
            $count = count($this->file);
            $newFilename = [];
            for ($i = 0; $i < $count; $i++) {
                $newName = ($timestamp + $i) . '.pdf';
                $newFilename[$i] = $newName;
                $this->file[$i]->storeAs('uploads', $newName);
            }
            $data = implode(',', $newFilename);
            $req = auth()->user()->actor->beneficiary->requestBeneficiary;
            $req->update([
                $this->types => $data
            ]);
            $this->uploadStatus = 'File uploaded and successfully saved !';
            $this->reset('file');
        } else {
            $newFilename = $timestamp . '.pdf';

            $req = auth()->user()->actor->beneficiary->requestBeneficiary;
            $req->update([
                $this->types => $newFilename
            ]);

            $this->file->storeAs('uploads', $newFilename);
        }
        $this->uploadStatus = 'File uploaded and successfully saved !';
        $this->reset('file');
    }

    public function render()
    {
        return view('livewire.send-documents');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use App\Models\Netdata;

class NetdataCrud extends Component
{
    use WithPagination;

    public string $room = '';
    public string $isp = '';
    public string $dia_ip = '';
    public ?string $bandwidth = null;
    public ?string $ip_address = null;
    public ?string $gateway = null;
    public ?string $ip_public = null;

    public bool $isEditing = false;
    public ?int $netId = null;
    public bool $showForm = false;
    public int $perPage = 10;
    public string $search = '';

    #[On('resetPage')]
    public function resetPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Netdata::query();

        if ($this->search) {
            $query->where('room', 'like', '%' . $this->search . '%')
                ->orWhere('isp', 'like', '%' . $this->search . '%')
                ->orWhere('dia_ip', 'like', '%' . $this->search . '%')
                ->orWhere('bandwidth', 'like', '%' . $this->search . '%')
                ->orWhere('ip_address', 'like', '%' . $this->search . '%')
                ->orWhere('gateway', 'like', '%' . $this->search . '%')
                ->orWhere('ip_public', 'like', '%' . $this->search . '%');
        }

        return view('livewire.netdata-crud', [
            'netdata' => $query->paginate($this->perPage),
        ]);
    }
    public function createNew()
    {
        $this->reset([
            'room',
            'isp',
            'dia_ip',
            'bandwidth',
            'ip_address',
            'gateway',
            'ip_public',
            'isEditing',
            'netId',
        ]);
        $this->showForm = true;
    }

    public function edit($id)
    {
        $net = Netdata::findOrFail($id);
        $this->isEditing = true;
        $this->netId = $net->id;
        $this->room = $net->room;
        $this->isp = $net->isp;
        $this->dia_ip = $net->dia_ip;
        $this->bandwidth = $net->bandwidth;
        $this->ip_address = $net->ip_address;
        $this->gateway = $net->gateway;
        $this->ip_public = $net->ip_public;
        $this->showForm = true;
    }

    public function save()
    {
        $rules = [
            'room' => 'required|string',
            'isp' => 'required|string',
            'dia_ip' => 'required|string',
            'bandwidth' => 'nullable|string',
            'ip_address' => 'nullable|string',
            'gateway' => 'nullable|string',
            'ip_public' => 'nullable|string',
        ];

        if ($this->isEditing && $this->netId) {
            $this->validate($rules);

            $net = Netdata::findOrFail($this->netId);
            $net->update([
                'room' => $this->room,
                'isp' => $this->isp,
                'dia_ip' => $this->dia_ip,
                'bandwidth' => $this->bandwidth,
                'ip_address' => $this->ip_address,
                'gateway' => $this->gateway,
                'ip_public' => $this->ip_public,
            ]);

            session()->flash('message', 'Net data updated successfully!');
        } else {
            $validated = $this->validate($rules);

            Netdata::create($validated);

            session()->flash('message', 'Net data created successfully!');
        }

        $this->closeForm();
    }

    public function delete($id)
    {
        Netdata::findOrFail($id)->delete();
        session()->flash('message', 'Net data deleted successfully!');
    }

    public function closeForm()
    {
        $this->reset([
            'room',
            'isp',
            'dia_ip',
            'bandwidth',
            'ip_address',
            'gateway',
            'ip_public',
            'isEditing',
            'netId',
            'showForm',
        ]);
        $this->resetValidation();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CarsList extends Component
{
    public $cars;
    public $state = [
        'marque' => '',
        'prix' => ''
    ];

    public $updateMode = false;


    public function mount()
    {
        $this->cars = Car::all();
    }

    private function resetInputFields(){
        $this->reset('state');
    }

    public function store()
    {
        $validator = Validator::make($this->state, [
            'marque' => 'required',
            'prix' => 'required|number',
        ])->validate();

        Car::create($this->state);

        $this->reset('state');
        $this->cars = Car::all();
    }


    public function edit($id)
    {
        $this->updateMode = true;

        $car = Car::find($id);

        $this->state = [
            'id' => $car->id,
            'marque' => $car->marque,
            'prix' => $car->prix,
        ];

    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->reset('state');
    }

    public function update()
    {
        $validator = Validator::make($this->state, [
            'marque' => 'required',
            'prix' => 'required|email',
        ])->validate();

        if ($this->state['id']) {
            $car = Car::find($this->state['id']);
            $car->update([
                'marque' => $this->state['marque'],
                'prix' => $this->state['prix'],
            ]);

            $this->updateMode = false;
            $this->reset('state');
            $this->cars = Car::all();
        }
    }
    public function delete($id)
    {
        if($id){
            Car::where('id',$id)->delete();
            $this->cars = Car::all();
        }
    }

    public function render()
    {
        return view('livewire.cars-list');
    }
}

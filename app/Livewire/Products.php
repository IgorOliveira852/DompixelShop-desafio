<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products, $name, $description, $price, $amount, $product_id;
    public $updateMode = false;

    public function render()
    {
        $this->products = Product::latest()->get();
        return view('livewire.products');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->price = '';
        $this->amount = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => [
                'required',
            ],
            'description' => [
                'required'
            ],
            'price' => [
                'required',
            ],
            'amount' => [
                'required',
            ],
        ]);

        $validatedDate['price'] = str_replace(',', '.', $validatedDate['price']);

        Product::create($validatedDate);

        session()->flash('message', 'Product Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->amount = $product->amount;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'price' => 'required',
            'amount' => 'required',
        ]);

        $post = Product::find($this->product_id);
        $post->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'amount' => $this->amount,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Product Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}

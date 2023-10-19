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
                'string'
            ],
            'description' => [
                'sometimes',
                'string',
                'nullable'
            ],
            'price' => [
                'required',
                "between:0.00,9999999.99"
            ],
            'amount' => [
                'required',
                'integer'
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
            'name' => [
                'required',
                'string'
            ],
            'description' => [
                'sometimes',
                'string',
                'nullable'
            ],
            'price' => [
                'required',
                "between:0.00,9999999.99"
            ],
            'amount' => [
                'required',
                'integer'
            ],
        ]);

        $validatedDate['price'] = str_replace(',', '.', $validatedDate['price']);

        $product = Product::find($this->product_id);
        $product->update($validatedDate);

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

    public function incrementAmount()
    {
        $this->amount++;
    }

    public function decrementAmount()
    {
        if ($this->amount > 0) {
            $this->amount--;
        }
    }
}

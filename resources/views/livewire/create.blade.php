<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Description:</label>
        <textarea class="form-control" id="exampleFormControlInput2" wire:model="description" placeholder="Enter Description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Price:</label>
        <textarea class="form-control" id="exampleFormControlInput3" wire:model="price" placeholder="Enter Price"></textarea>
        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">Amount:</label>
        <div class="input-group">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" wire:click="incrementAmount">+</button>
                <button class="btn btn-outline-secondary" type="button" wire:click="decrementAmount">-</button>
            </div>
            <input type="text" class="form-control" wire:model="amount" placeholder="Enter Amount">
        </div>
        @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>

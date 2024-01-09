<div>
    counter: {{$count}}
    <br>
    {{$name}}
    <button class="btn btn-success" wire:click="increment">+</button>
    <hr>
    <label>
        <input type="text" wire:model="name"/>
    </label>
    <br>
    <button class="btn btn-danger" wire:click="changeName"> chang name to alpay</button>

</div>

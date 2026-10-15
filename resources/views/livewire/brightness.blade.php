<div>
    <button class="btn btn-danger" wire:click="off">Off</button>
	<input type="range" wire:model.change="brightness" class="form-control-range" min="0" max="100" >

    <span wire:text="brightness"></span>
</div>
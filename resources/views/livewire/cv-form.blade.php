<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit="save">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" wire:model="name" class="form-control" placeholder="Your name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">CV (PDF, DOC, DOCX)</label>
            <input type="file" wire:model="cv" class="form-control">

            <div wire:loading wire:target="cv" class="text-muted">Uploading...</div>

            @if ($cv)
                <small class="text-success">Selected: {{ $cv->getClientOriginalName() }}</small>
            @endif

            @error('cv') <span class="text-danger d-block">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal" wire:loading.attr="disabled" wire:target="save">
            <span wire:loading.remove wire:target="save">Send</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </form>
</div>
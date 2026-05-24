<div>
    <form wire:submit="save">
        {{ $this->form }}

        <button type="submit" class=" bg-yellow-600 px-4 py-2 rounded-2xl my-6">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>

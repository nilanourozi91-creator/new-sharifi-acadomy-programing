<?php

namespace App\Livewire\Admin;

// use Admin;

use App\Models\Admin;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class editadmin extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Admin $record;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('edit')->description('edit your Admin just less than one minute')->schema([
                    TextInput::make('user.name')->label('name'),
                    TextInput::make('last_name'),
                    TextInput::make('user.email'),
                    Textarea::make('bio'),
                ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();

        $this->record->update($data);
        return redirect('/manage-payments');
    }

    public function render(): View
    {
        return view('livewire.admin.editadmin');
    }
}

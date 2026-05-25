<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class editteacher extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Teacher $record;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                  Section::make('edite payments')->description('edite your payments')->schema([
                TextInput::make('user.name')->label('teacher'),
                TextInput::make('last_name'),
                TextInput::make('sinfs.title'),
                TextInput::make('phone_number'),
                TextInput::make('degree_of_education'),
                TextInput::make('bio'),
                ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();

        $this->record->update($data);
        return redirect('/manage-teachers');
    }

    public function render(): View
    {
        return view('livewire.teacher.editteacher');
    }
}

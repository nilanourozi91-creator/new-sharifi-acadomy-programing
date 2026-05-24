<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class editstudent extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public  Student $record;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                  Section::make('edite payments')->description('edite your students')->columns(2)->schema([
                 TextInput::make('user.name')->label('name'),
                 TextInput::make('user.email')->label('email'),
                 TextInput::make('phone_number'),
                 TextInput::make('tazkira_no'),
                 TextInput::make('last_name'),
                ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();

        $this->record->update($data);
        return redirect('/manage-students');
    }

    public function render(): View
    {
        return view('livewire.student.editstudent');
    }
}

<?php

namespace App\Livewire\Salary;

use App\Models\Salary;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class editsalary extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Salary $record;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('edit')->description('update your salaries less than 1 minute')->columns(2)->schema([
                    TextInput::make('teacher.user.name')->label('teacher_name'),
                    DatePicker::make('year')->format('y-m-d'),
                    DatePicker::make('month')->format('y-m-d'),
                    DatePicker::make('day')->format('y-m-d'),
                    TextInput::make('amount'),
                ]),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save() 
    {
        $data = $this->form->getState();

        $this->record->update($data);
        return redirect('/manage-salaries');
    }

    public function render(): View
    {
        return view('livewire.salary.editsalary');
    }
}

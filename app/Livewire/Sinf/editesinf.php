<?php

namespace App\Livewire\Sinf;

use App\Models\Sinf;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;


class editesinf extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public Sinf $record;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('rate limating')->description('edit the classes of the center')->columns(2)->schema(
                    [
                        TextInput::make('title')->label('class_name')->required(),
                        DatePicker::make('start_date')->format('y-m-d'),
                        DatePicker::make('end_date')->format('y-m-d'),
                        Textarea::make('description'),
                    ]
                )
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save()
    {
        $data = $this->form->getState();

        $this->record->update($data);
        return redirect('/manage-classes');
    }

    public function render(): View
    {
        return view('livewire.sinf.editesinf');
    }
}

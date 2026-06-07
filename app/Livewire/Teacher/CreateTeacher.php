<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;
// use Teacher;

class CreateTeacher extends Component implements HasActions, HasSchemas
{
    use InteractsWithActions;
    use InteractsWithSchemas;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Create teacher')->description('creating new teacher')->schema([
                  TextInput::make('last_name'),
                  TextInput::make('degree_of_education'),
                  TextInput::make('phone_number'),
                  Textarea::make('bio'),
                  Select::make('user_id')
                    ->relationship('user', 'name')
                     ->required(),
                  FileUpload::make('image_url')->image()->directory('teacher_imgs')->disk('public')->imageEditor()->imageEditorAspectRatioOptions(['16:9','4:3','1:1' ])]),
            ])
            ->statePath('data')
            ->model(Teacher::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        $record = Teacher::create($data);

        $this->form->model($record)->saveRelationships();
           
        return redirect('/manage-teachers');
    }

    public function render(): View
    {
        return view('livewire.teacher.create-teacher');
    }
}

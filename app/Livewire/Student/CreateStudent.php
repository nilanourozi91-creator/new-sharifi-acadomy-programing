<?php

namespace App\Livewire\Student;

use App\Models\Student;
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


class CreateStudent extends Component implements HasActions, HasSchemas
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
                 Section::make('Create student')->description('creating new students')->schema([
                  TextInput::make('last_name'),
                  TextInput::make('tazkira_no'),
                  TextInput::make('phone_number'),
                  Select::make('user_id')->relationship('user','name')->required(),
                  FileUpload::make('image_url')->image()->directory('students_imgs')->disk('public')->imageEditor()->imageEditorAspectRatioOptions(['16:9','4:3','1:1' ])]),
            ])
            ->statePath('data')
            ->model(Student::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        $record = Student::create($data);

        $this->form->model($record)->saveRelationships();
        return redirect('/manage-students');
    }

    public function render(): View
    {
        return view('livewire.student.create-student');
    }
}

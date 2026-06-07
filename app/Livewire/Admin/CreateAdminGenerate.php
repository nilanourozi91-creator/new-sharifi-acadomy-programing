<?php

namespace App\Livewire\Admin;
use App\Models\Admin;
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

class CreateAdminGenerate extends Component implements HasActions, HasSchemas
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
                Section::make('create new admin')->description('creating new admin')->schema([
                    TextInput::make('last_name'),
                    Textarea::make('bio')->rows(3),
                    Select::make('user_id')->relationship('user','name'),
                    FileUpload::make('image_url')->disk('public')->directory('admin_images')->image()->imageEditor(),
                ])
            ])
            ->statePath('data')
            ->model(Admin::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        $record = Admin::create($data);

        $this->form->model($record)->saveRelationships();
        return redirect('/admin');
    }

    public function render(): View
    {
        return view('livewire.admin.create-admin-generate');
    }
}

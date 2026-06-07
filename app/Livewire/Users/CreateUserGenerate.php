<?php

namespace App\Livewire\Users;

use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class CreateUserGenerate extends Component implements HasActions, HasSchemas
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
                Section::make('create new user')->description('creating new user')->schema([
                    TextInput::make('name'),
                    textInput::make('email')->email(),
                    TextInput::make('password')->password(),
                    TextInput::make('role'),
                ])
            ])
            ->statePath('data')
            ->model(User::class);
    }

    public function create()
    {
        $data = $this->form->getState();

        $record = User::create($data);

        $this->form->model($record)->saveRelationships();
        return redirect('/manage-users');
    }

    public function render(): View
    {
        return view('livewire.users.create-user-generate');
    }
}

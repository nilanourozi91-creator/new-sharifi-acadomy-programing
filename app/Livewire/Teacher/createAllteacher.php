<?php

namespace App\Livewire\Teacher;

use App\Models\User;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;
use Livewire\Component;

use function Laravel\Prompts\textarea;

class createAllteacher extends Component implements HasActions, HasSchemas
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
                
                Wizard::make([
                   Step::make('user')->columns(2)->completedIcon(Heroicon::CheckBadge)->icon(Heroicon::User)->description('create new user')->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->required()->email(),
                        TextInput::make('password')->password()->required(),
                   ]),
                  Step::make('teacher')->columns(2)->completedIcon(Heroicon::CheckBadge)->icon(Heroicon::UserCircle)->description('create new teacher')->schema([
                         TextInput::make('last_name'),
                         TextInput::make('degree_of_education'),
                         TextInput::make('phone_number'),
                         textarea::make('bio')->required(),
                        //  FileUpload::make('image_url')->directory('teacher_imgs')->disk('public'),
                          FileUpload::make('image_url')->directory('teacher_imgs')->disk('public'),
                  ]),
                ])->submitAction(new HtmlString("<button type='submit'>Save</button>")),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
        DB::transaction(function() use ($data){
            $user = User::create([
          'name'=>$data['name'],
          'email'=>$data['email'],
          'password'=>$data['password'],
          'user_type'=>'student',
            ]);
            $user->Teacher()->create([
                'last_name'=>$data['last_name'],
                'degree_of_education'=>$data['degree_of_education'],
                'phone_number'=>$data['phone_number'],
                'image_url'=>$data['image_url'],
                'bio'=>$data['bio'],
            ]);
            return redirect()->route('teachers.index');
        });
    }

    public function render(): View
    {
        return view('livewire.teacher.create-allteacher');
    }
}

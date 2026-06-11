<?php

namespace App\Livewire\Finnernce;

use App\Models\Sinf;
use App\Models\User;
use Database\Seeders\userseeder;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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

class createfinnence extends Component implements HasActions, HasSchemas
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
                   Step::make('user')->label('user')->completedIcon(Heroicon::CheckBadge)->icon(Heroicon::User)->description('create new user')->schema([
                     TextInput::make('name')->required(),                   
                     TextInput::make('email')->email()->required(),                   
                     TextInput::make('password')->required()->password(),                   
                     ])->columns(2),
                     Step::make('students')->completedIcon(Heroicon::CheckBadge)->icon(Heroicon::AcademicCap)->description('create new students')->schema([
                       TextInput::make('last_name')->required(),
                       TextInput::make('phone_number')->required(),
                       TextInput::make('tazkira_no')->required(),
                       FileUpload::make('image_url')->directory('students_imgs')->disk('public'),
                     ])->columns(2),
                       Step::make('payment')->completedIcon(Heroicon::CheckBadge)->icon(Heroicon::Banknotes)->description('create new payment')->schema([
                       TextInput::make('amount')->required(),
                        Select::make('sinf_id')->options(Sinf::query()->pluck('title','id'))->label('sinfs')->searchable(),
                     ])->columns(2),
               ])->submitAction(new HtmlString("<button type='submit'>Save</button>"))
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = $this->form->getState();
       DB::transaction(function() use($data){
       $user = User::create([
          'name'=>$data['name'],
          'email'=>$data['email'],
          'password'=>$data['password'],
          'user_type'=>'student',
        ]);
        $student= $user->student()->create([
            'last_name'=>$data['last_name'],
            'phone_number'=>$data['phone_number'],
            'tazkira_no'=>$data['tazkira_no'],
            'image_url'=>$data['image_url'],
          ]);
         $student->payments()->create([
          'amount'=>$data['amount'],
          'sinf_id'=>$data['sinf_id'],
          ]);
          return redirect()->route('payments.index');
       });
    }

    public function render(): View
    {
        return view('livewire.finnernce.createfinnence');
    }
}

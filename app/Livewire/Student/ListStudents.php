<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListStudents extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Student::query())
            ->columns([
                TextColumn::make('user.name')->searchable()->label('Name'),
                TextColumn::make('user.email')->searchable()->label('Email'),
                TextColumn::make('last_name')->label('Lastname'),
                TextColumn::make('payments.sinf.title')->label('payments'),
                TextColumn::make('phone_number'),
                TextColumn::make('tazkira_no'),
                ImageColumn::make('image_url')->disk('public')->label('images')->square(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                     Action::make('edit')->url(fn( $record):string=>route('students.edit',$record))->openUrlInNewTab(),
                      Action::make('delete')->color('danger')->requiresConfirmation()->action(fn(Student $record)=>$record->delete($record->id),),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.student.list-students');
    }
}

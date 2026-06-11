<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Notifications\Notification;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Action as NotificationsAction;
use Livewire\Component;

use function Pest\Laravel\actingAs;

class ListTeachers extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Teacher::query())
            ->columns([
                TextColumn::make('user.name')->label('teacher'),
                TextColumn::make('last_name')->searchable(),
                TextColumn::make('sinfs.title')->limitList()->badge(),
                TextColumn::make('phone_number')->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('degree_of_education')->badge(),
                ImageColumn::make('image_url')->label('image')->disk('public')->square(),
                TextColumn::make('bio')->limit(10)->toggleable(isToggledHiddenByDefault:true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
               Action::make('create teacher')->label('create new teacher')->url(route('teachers.all'))->color('info'),
            ])
            ->recordActions([
                Action::make('delete')->requiresConfirmation()->action(fn(Teacher $record)=>$record->delete($record->id))->color('danger')->successNotification(
                    Notification::make()->title('teacher deleted sucssesfully')->success()),
                    Action::make('edit')->url(fn(Teacher $record):string=>route('teachers.edit',$record))->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.teacher.list-teachers');
    }
}

<?php

namespace App\Livewire\Salary;

use App\Models\Salary;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Notifications\Notification;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListSalaries extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Salary::query())
            ->columns([
                TextColumn::make('teacher.user.name')->label('Teacher name'),
                TextColumn::make('year')->date(),
                TextColumn::make('month'),
                TextColumn::make('day')->dateTime(),
                TextColumn::make('amount')->money('Afgh'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                   Action::make('edit')->url(fn(Salary $record):string=>route('salaries.edit',$record))->openUrlInNewTab(),
                Action::make('delete')->requiresConfirmation()->action(fn(Salary $record)=>$record->delete($record->id))->color('danger')->successNotification(
                    Notification::make()->title('salaries deleted sucssfully')->success()
                ),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.salary.list-salaries');
    }
}

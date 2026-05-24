<?php

namespace App\Livewire\Sinf;

use App\Models\Sinf;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListSinfs extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Sinf::query())
            ->columns([
            
                TextColumn::make('title')->label('class')->searchable(),
                textColumn::make('description')->limit(10)->toggleable(isToggledHiddenByDefault:true),
                TextColumn::make('start_date'),
                 TextColumn::make('payments.student.user.name')->label('Students'),
                TextColumn::make('end_date'),
                TextColumn::make('teacher.user.name')->label('teacher'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                Action::make('edite')->url(fn(Sinf $record):string=>route('class.edit',$record))->openUrlInNewTab()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.sinf.list-sinfs');
    }
}

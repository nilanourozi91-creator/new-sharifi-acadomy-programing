<?php

namespace App\Livewire\Admin;

use App\Models\Admin;
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
use Livewire\Component;

class ListAdmins extends Component implements HasActions, HasSchemas, HasTable
{
    use InteractsWithActions;
    use InteractsWithTable;
    use InteractsWithSchemas;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Admin::query())
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('last_name'),
                TextColumn::make('user.email')->label('email'),
                TextColumn::make('bio')->toggleable(isToggledHiddenByDefault:true),
                ImageColumn::make('image_url')->disk('public')->label('image')->square(),
                ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('create new admin')->label('create new admin')->url(route('admin.create'))->color('info'),
            ])
            ->recordActions([
                Action::make('delete')->requiresConfirmation()->action(fn (Admin $reord)=>$reord->delete($reord->id))->color('danger'),
                Action::make('edit')->url(fn(Admin $record):string=>route('admin.edit',$record))->openUrlInNewTab(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.admin.list-admins');
    }
}

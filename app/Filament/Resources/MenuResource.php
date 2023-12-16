<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make("date")
                    ->required(),
                Forms\Components\Select::make("period")->label('Periode')
                    ->required()
                    ->options([
                        'AM' => "Matin",
                        'PM' => "Soir"
                    ])
                    ->default("AM"),
                Forms\Components\Repeater::make("dishMenus")
                    ->relationship()
                    ->schema([
                        Select::make('dish_id')->relationship('dish', 'name')->required(),
                        TextInput::make("qty")->required()->numeric()->name("Quantity")
                    ])->grid(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')->date("l, j M Y"),
                Tables\Columns\TextColumn::make('period')->label('Periode'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("Period")->label('Periode')
                    ->options([
                        'AM' => "Matin",
                        'PM' => "Soir"
                    ]),
                Filter::make('date')
                    ->form([
                        DatePicker::make("selected_date")
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when(
                            $data['selected_date'],
                            fn(Builder $query, $date) => $query->whereDate("date", $date)
                        );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DishResource\Pages;
use App\Filament\Resources\DishResource\RelationManagers;
use App\Models\Dish;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DishResource extends Resource
{
    protected static ?string $model = Dish::class;

    protected static ?string $navigationIcon = 'heroicon-m-square-2-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make("price")
                    ->required()
                    ->options([
                        200 => "200 FCFA",
                        500 => "500 FCFA"
                    ])
                    ->default(200),
                Forms\Components\Textarea::make('description')
                    ->rows(10)
                    ->cols(20),
                Forms\Components\FileUpload::make('image')
                    ->disk("local")
                    ->directory("public/dish-images")
                    ->visibility("public"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk("local"),
                Tables\Columns\TextColumn::make('name')->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("price")
                    ->options([
                        200 => "200 FCFA",
                        500 => "500 FCFA"
                    ]),

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
            'index' => Pages\ListDishes::route('/'),
            'create' => Pages\CreateDish::route('/create'),
            'edit' => Pages\EditDish::route('/{record}/edit'),
        ];
    }
}

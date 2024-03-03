<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label("Ім`я"),
                Forms\Components\TextInput::make('surname')->label('Прізвище'),
                Forms\Components\TextInput::make('last_name')->label('По-батькові'),
                Forms\Components\TextInput::make('email')->label('Пошта')->email(),
                Forms\Components\Select::make('rank')->label('Посада')
                    ->options([
                        'Асистент' => 'Асистент', 'Ст. Викладач' => 'Ст. Викладач', 'Доцент' => 'Доцент', 'Професор' => 'Професор'
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label("Ім`я"),
                Tables\Columns\TextColumn::make('surname')->label('Прізвище'),
                Tables\Columns\TextColumn::make('last_name')->label('По-батькові'),
                Tables\Columns\TextColumn::make('email')->label('Пошта'),
                Tables\Columns\TextColumn::make('rank')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}

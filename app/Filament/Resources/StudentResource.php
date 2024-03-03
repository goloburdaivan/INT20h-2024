<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label("Ім`я"),
                Forms\Components\TextInput::make('surname')->label('Прізвище'),
                Forms\Components\TextInput::make('last_name')->label('По-батькові'),
                Forms\Components\TextInput::make('email')->label('Електронна пошта')->email(),
                Forms\Components\TextInput::make('password')->label('Пароль')->password(),
                Forms\Components\Select::make('status')->label('Статус')
                    ->options([
                        'Контракт' => 'Контракт',
                        'Бюджет' => 'Бюджет'
                    ]),
                Forms\Components\TextInput::make('attestat')->label('Номер атестату'),
                Forms\Components\TextInput::make('pass_num')->label('Номер паспорту'),
                Forms\Components\Select::make('group_id')->label('Група')
                    ->relationship('group', 'code')
                    ->searchable()
                    ->options(Group::all()->pluck('code', 'id')),
                Forms\Components\Select::make('disciplines')->multiple()
                ->relationship('disciplines', 'title')
                ->options(Discipline::all()->pluck('title', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->label("Ім'я")->sortable()->searchable(),
                Tables\Columns\TextColumn::make('surname')->label('Прізвище')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('По-батькові')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Електронна пошта')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Статус')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('attestat')->label('Номер атестату')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('pass_num')->label('Номер паспорту')->sortable()->searchable(),
            ])
            ->filters([
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}

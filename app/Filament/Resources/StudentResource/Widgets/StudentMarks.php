<?php

namespace App\Filament\Resources\StudentResource\Widgets;

use App\Models\Mark;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends BaseWidget
{

    public ?Model $record = null;


    public function table(Table $table): Table
    {
        return $table
            ->query(Mark::where('student_id', $this->record->id))
            ->columns([
                Tables\Columns\TextColumn::make('discipline.title'),
                Tables\Columns\TextColumn::make('mark_date'),
                Tables\Columns\TextColumn::make('mark')
            ])
            ->defaultGroup('discipline.title');
    }
}

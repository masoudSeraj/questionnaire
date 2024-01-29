<?php

namespace App\Filament\Admin\Resources\AnswerResource\RelationManagers;

use App\Enums\Code;
use App\Enums\Score;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('answer')
                    ->label('سوال')
                    ->required()
                    ->maxLength(255),
                Select::make('code')->label('کد')->options(array_map(
                    fn ($value) => $value->name,
                    Code::cases()
                )),
                Select::make('score')->label('امتیاز')->options(
                    collect(Score::cases())->mapWithKeys(
                        fn ($value) => [$value->value => $value->value]
                    )
                ),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('answer')
            ->columns([
                Tables\Columns\TextColumn::make('answer')->label('سوال'),
                Tables\Columns\TextColumn::make('code')->formatStateUsing(fn ($state) => Code::tryFrom($state)->name)->label('کد'),
                Tables\Columns\TextColumn::make('score')->formatStateUsing(fn ($state) => Score::tryFrom($state)->value.' / '.Score::tryFrom($state)->translate())->label('امتیاز'),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

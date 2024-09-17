<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilebaseResource\Pages;
use App\Filament\Resources\FilebaseResource\RelationManagers;
use App\Models\Filebase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Radio;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilebaseResource extends Resource
{
    public static ?string $label = "File Base";

    protected static ?string $model = Filebase::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_filebase')
                    ->required()
                    ->maxLength(5),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
                Radio::make('status')
                    ->required()
                    ->options([
                        'active' => 'Active',
                        'disabled' => 'Disabled'
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_filebase')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListFilebases::route('/'),
            'create' => Pages\CreateFilebase::route('/create'),
            'edit' => Pages\EditFilebase::route('/{record}/edit'),
        ];
    }
}

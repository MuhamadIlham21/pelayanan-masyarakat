<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananResource\Pages;
use App\Filament\Resources\LayananResource\RelationManagers;
use App\Models\Layanan;
use App\Models\Filebase;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Radio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;

class LayananResource extends Resource
{
    public static ?string $label = "Layanan";

    protected static ?string $model = Layanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_layanan')
                    ->required()
                    ->numeric()
                    ->autocomplete(false)
                    ->maxLength(10),
                Forms\Components\TextInput::make('nama_layanan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('keterangan')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->default(null),
                Checkbox::make('is_tagihan')
                ->label('Perlu Tagihan?')
                ->columnSpanFull(),
                Checkbox::make('is_pdf')
                ->label('Perlu output PDF?')
                ->columnSpanFull()
                ->live(),
                Checkbox::make('is_attachment')
                ->label('Perlu melampirkan file?')
                ->columnSpanFull()
                ->live(),
                Select::make('file_persyaratan')
                    ->multiple()
                    ->searchable()
                    ->options(Filebase::all()->pluck('keterangan', 'id'))
                    ->visible(fn (Get $get): bool =>  $get('is_attachment')),
                Forms\Components\Textarea::make('header')
                    ->hint('Pembuka surat')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool =>  $get('is_pdf')),
                Select::make('body')
                    ->hint('Identitas yang tercantum di surat')
                    ->multiple()
                    ->options([
                        'nik' => 'NIK',
                        'no_kk' => 'NO KK',
                        'nama' => 'Nama',
                        'jenis_kelamin' => 'Jenis Kelamin',
                        'alamat' => 'Alamat',
                        'status_warga' => 'Status Warga',
                        'pekerjaan' => 'Pekerjaan',
                        'agama' => 'Agama',
                        'tanggal_lahir' => 'Tanggal Lahir',
                        'status_perkawinan' => 'Status Perkawinan',
                        'pendidikan' => 'Pendidikan'
                    ])
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool =>  $get('is_pdf')),
                Forms\Components\Textarea::make('footer')
                    ->hint('Penutup Surat')
                    ->columnSpanFull()
                    ->visible(fn (Get $get): bool =>  $get('is_pdf')),
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
                Tables\Columns\TextColumn::make('kode_layanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_layanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_tagihan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_pdf')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_attachment')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListLayanans::route('/'),
            'create' => Pages\CreateLayanan::route('/create'),
            'edit' => Pages\EditLayanan::route('/{record}/edit'),
        ];
    }
}

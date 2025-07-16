<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerAdvertsementResource\Pages;
use App\Filament\Resources\BannerAdvertsementResource\RelationManagers;
use App\Models\BannerAdvertsement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class BannerAdvertsementResource extends Resource
{
    protected static ?string $model = BannerAdvertsement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('link')
                -> activeUrl()
                ->required()
                ->maxLength(225),

                Forms\Components\FileUpload::make('thumbnail')
                ->required()
                ->image(),

                Forms\Components\Select::make('is_active')
                ->options([
                    'active' => 'Active',
                    'not_active' => 'Not active',
                ])
                ->required(),

                Forms\Components\Select::make('type')
                ->options([
                    'banner' => 'Banner',
                    'square' => 'Square',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('link')
                ->searchable(),

                Tables\Columns\TextColumn::make('is_active')
                ->badge()
                ->color(fn (string $state): string => match($state){
                    'active' => 'success',
                    'not_active' => 'danger',
                }),

                Tables\Columns\ImageColumn::make('thumbnail') ,
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
            'index' => Pages\ListBannerAdvertsements::route('/'),
            'create' => Pages\CreateBannerAdvertsement::route('/create'),
            'edit' => Pages\EditBannerAdvertsement::route('/{record}/edit'),
        ];
    }
}

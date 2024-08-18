<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Select;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->placeholder('Enter the product name')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->autofocus(),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->placeholder('Enter the product slug'),
                    ]),
                Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->placeholder('Enter the product description'),
                Fieldset::make('SEO Metadata')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->required()
                            ->placeholder('Enter the product meta title'),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->required()
                            ->placeholder('Enter the product meta description'),
                        Textarea::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->required()
                            ->placeholder('Enter the product meta keywords'),
                    ]),
                Grid::make(2)
                    ->schema([
                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->required()
                            ->placeholder('Enter the product price'),
                        TextInput::make('stock')
                            ->label('Stock')
                            ->numeric()
                            ->required()
                            ->placeholder('Enter the product stock'),
                    ]),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        0 => 'Inactive',
                        1 => 'Active',
                    ])
                    ->default(false),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->imagePreviewHeight('250')
                    ->enableDownload()
                    ->enableOpen(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                BooleanColumn::make('status')
                    ->label('Status')
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stock')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        1 => 'Active',
                        0 => 'Inactive',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}

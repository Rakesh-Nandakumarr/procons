<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Fieldset;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->disabled(),

                select::make('cart_id')
                    ->label('Cart ID')
                    ->disabled()
                    ->relationship('cart', 'id'),
                Fieldset::make('Shipping Details')->schema([
                    TextInput::make('shipping_first_name')
                        ->label('First Name')
                        ->required(),

                    TextInput::make('shipping_last_name')
                        ->label('Last Name')
                        ->required(),

                    TextInput::make('shipping_address')
                        ->label('Address')
                        ->required(),

                    TextInput::make('shipping_post_code')
                        ->label('Post Code')
                        ->required(),

                    TextInput::make('shipping_city')
                        ->label('City')
                        ->required(),

                    TextInput::make('shipping_district')
                        ->label('District')
                        ->required(),

                    TextInput::make('shipping_phone')
                        ->label('Phone')
                        ->required()
                        ->minLength(10)
                        ->maxLength(20),
                ]),
                Fieldset::make('Billing Details')->schema([
                    TextInput::make('billing_first_name')
                        ->label('First Name')
                        ->required(),

                    TextInput::make('billing_last_name')
                        ->label('Last Name')
                        ->required(),

                    TextInput::make('billing_address')
                        ->label('Address')
                        ->required(),

                    TextInput::make('billing_post_code')
                        ->label('Post Code')
                        ->required(),

                    TextInput::make('billing_city')
                        ->label('City')
                        ->required(),

                    TextInput::make('billing_district')
                        ->label('District')
                        ->required(),

                    TextInput::make('billing_phone')
                        ->label('Phone')
                        ->required()
                        ->minLength(10)
                        ->maxLength(20),
                ]),
                Select::make('payment_status')
                    ->label('Payment Status')
                    ->required()
                    ->options([
                        'Unpaid' => 'Unpaid',
                        'Paid' => 'Paid',
                        'Cancelled' => 'Cancelled',
                    ]),
                Select::make('shipping_status')
                    ->label('Shipping Status')
                    ->required()
                    ->options([
                        'Pending' => 'Pending',
                        'Processing' => 'Processing',
                        'Shipped' => 'Shipped',
                        'Cancelled' => 'Cancelled',
                        'Delivered' => 'Delivered',
                    ]),
                TextInput::make('total')
                    ->label('Total')
                    ->disabled()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('cart_id')
                    ->label('Cart ID')
                    ->sortable(),
                TextColumn::make('total')
                    ->label('Total')
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->sortable(),
                TextColumn::make('shipping_status')
                    ->label('Shipping Status')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Details')
                    ->icon('heroicon-o-rectangle-stack')
                    ->color('zinc')
                    ->url(fn(Order $order) => route('filament.order.details', $order)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
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
            'index' => Pages\ManageOrders::route('/'),
        ];
    }
}

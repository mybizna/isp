<?php

namespace Modules\Isp\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Isp\Filament\Resources\SubscriberLoginResource\Pages;
use Modules\Isp\Models\SubscriberLogin;

class SubscriberLoginResource extends BaseResource
{
    protected static ?string $model = SubscriberLogin::class;

    protected static ?string $slug = 'isp/subscriber/login';

    protected static ?string $navigationGroup = 'Isp';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('mac')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('ip')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('username')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_login')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_orig')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('error')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('chap_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('chap_challenge')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_login_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_orig_esc')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('mac_esc')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mac')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_login')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_orig')
                    ->searchable(),
                Tables\Columns\TextColumn::make('error')
                    ->searchable(),
                Tables\Columns\TextColumn::make('chap_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('chap_challenge')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_login_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_orig_esc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mac_esc')
                    ->searchable(),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {

        return [
            'index' => Pages\Listing::route('/'),
            'create' => Pages\Creating::route('/create'),
            'edit' => Pages\Editing::route('/{record}/edit'),
        ];
    }
}

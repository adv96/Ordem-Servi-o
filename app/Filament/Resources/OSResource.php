<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OSResource\Pages;
use App\Filament\Resources\OSResource\RelationManagers;
use App\Models\Cliente;
use App\Models\OS;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Actions\Action;

class OSResource extends Resource
{
    protected static ?string $model = OS::class;

    protected static ?string $modelLabel = 'Ordem de Serviço';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cliente_id')
                    ->relationship('cliente', 'name')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('Endereço')
                    ->relationship('cliente', 'endereco')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('E-mail')
                    ->relationship('cliente', 'email')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('CPF')
                    ->relationship('cliente', 'cpf')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('Telefone:')
                    ->relationship('cliente', 'telefone')
                    ->required(),
                Forms\Components\Select::make('servico_id')
                    ->relationship('servico', 'name')
                    ->required(),
                Forms\Components\RichEditor::make('descricao')
                    ->label('Descrição')
                    ->maxLength(50000)
                    ->required(),
                Forms\Components\TextInput::make('preco')
                    ->label('Preço')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.name')
                    ->numeric()
                    ->sortable(),
                //Tables\Columns\TextColumn::make('cliente.endereco')
                 //   ->label('Endereço')
                 //   ->numeric()
                 //   ->sortable(),
              //  Tables\Columns\TextColumn::make('cliente.email')
                //    ->label('Email')
                //    ->numeric()
                //   ->sortable(),
               // Tables\Columns\TextColumn::make('cliente.cpf')
                //    ->label('CPF')
                //    ->numeric()
                //    ->sortable(),
               // Tables\Columns\TextColumn::make('cliente.telefone')
                 //   ->label('Telefone')
                 //   ->numeric()
                 //   ->sortable(),
                Tables\Columns\TextColumn::make('servico.name')
                    ->label('Serviço')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descricao')
                    ->label('Descrição')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preco')
                    ->label('Preço')
                    ->numeric()
                    ->summarize(sum::make()->label('Total')->numeric( locale: 'nl',))->color('success')
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
                Action::make('Download Pdf')
                ->icon('heroicon-o-document-arrow-down')
                ->url(fn(OS $record): string => route('student.pdf.download', ['record' => $record]))
                ->openUrlInNewTab(), 
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
            'index' => Pages\ListOS::route('/'),
            'create' => Pages\CreateOS::route('/create'),
            'edit' => Pages\EditOS::route('/{record}/edit'),
        ];
    }
}

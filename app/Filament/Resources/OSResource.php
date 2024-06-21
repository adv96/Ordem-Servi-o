<?php

namespace App\Filament\Resources;

use App\Enums\ChargeStatusEnum;
use App\Filament\Resources\OSResource\Pages;
use App\Filament\Resources\OSResource\RelationManagers;
use App\Models\Cliente;
use App\Models\OS;
use Faker\Core\Number as CoreNumber;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Actions\Action;use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Number;


class OSResource extends Resource
{
    protected static ?string $model = OS::class;

    protected static ?string $modelLabel = 'Ordem de Serviço';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = 'Área de Ordem de Serviço';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form->columns(3)
            ->schema([
                Forms\Components\Fieldset::make('Dados do Cliente')->schema([
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
                    ->label('CPF ou CNPJ')
                    ->relationship('cliente', 'cpf')
                    ->required(),
                Forms\Components\Select::make('cliente_id')
                    ->label('Telefone:')
                    ->relationship('cliente', 'telefone')
                    ->required(),
                Forms\Components\TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required()
                    ->rules('integer|min:1|max:50')
                    ->default(1),
                    
                Forms\Components\Textarea::make('descricao')
                    //->columnSpanFull()
                    //->label('Descrição')
                    ->maxLength(50000)
                    ->columns(2)
                    ->label('Descrição'),
                
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(ChargeStatusEnum::class)
                    ->searchable()
                    ->preload(),
                ]),

                Forms\Components\Fieldset::make('Dados do Serviço')->schema([

                Forms\Components\Select::make('servico_id')
                    ->relationship('servico', 'name')
                    ->required(),
                Forms\Components\Select::make('servico_id')
                    ->label('Preço:')
                    ->relationship('servico', 'valor')
                    ->required(),
                ])
            ]);
            

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cliente.name')
                    ->numeric()
                    ->sortable(),
                //Tables\Columns\TextColumn:'pt_BR'
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
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    //->label('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('servico.valor')
                    ->label('Preço')
                    ->formatStateUsing(fn (int $state): string => 'R$ ' . number_format($state, 2, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Qtd de Manutenção')
                    ->sortable()
                    ->numeric()
                    ->summarize(Tables\Columns\Summarizers\Sum::make('quantidade')->label('Total')->numeric())
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('pt_BR')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('pt_BR')
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

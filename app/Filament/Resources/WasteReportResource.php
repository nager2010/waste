<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WasteReportResource\Pages;
use App\Models\WasteReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Forms\Components\LocationPicker;

class WasteReportResource extends Resource
{
    protected static ?string $model = WasteReport::class;
    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = 'بلاغات القمامة';
    protected static ?string $modelLabel = 'بلاغ قمامة';
    protected static ?string $pluralModelLabel = 'بلاغات القمامة';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات المبلغ')
                    ->schema([
                        TextInput::make('reporter_name')
                            ->label('اسم المبلغ')
                            ->required()
                            ->placeholder('أدخل اسم المبلغ')
                            ->maxLength(255),
                    ])->columnSpan(2),

                Section::make('موقع القمامة')
                    ->schema([
                        LocationPicker::make('map_location')
                            ->label('اختر الموقع على الخريطة'),
                        TextInput::make('latitude')
                            ->label('خط العرض')
                            ->required()
                            ->numeric()
                            ->default(25.9155),
                        TextInput::make('longitude')
                            ->label('خط الطول')
                            ->required()
                            ->numeric()
                            ->default(13.9180),
                    ])->columnSpan(2),

                Section::make('تفاصيل البلاغ')
                    ->schema([
                        Textarea::make('description')
                            ->label('وصف البلاغ')
                            ->required()
                            ->placeholder('اكتب وصفاً تفصيلياً عن موقع وحالة القمامة')
                            ->rows(4),
                        FileUpload::make('images')
                            ->label('الصور')
                            ->multiple()
                            ->image()
                            ->maxFiles(5)
                            ->directory('waste-reports')
                            ->downloadable(),
                    ])->columnSpan(2),

                Section::make('حالة البلاغ')
                    ->schema([
                        Select::make('status')
                            ->label('حالة البلاغ')
                            ->options([
                                'pending' => 'قيد الانتظار',
                                'in_progress' => 'جاري المعالجة',
                                'completed' => 'تم المعالجة'
                            ])
                            ->default('pending')
                            ->required()
                    ])->columnSpan(2)
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reporter_name')
                    ->label('اسم المبلغ')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('الوصف')
                    ->limit(50),
                TextColumn::make('status')
                    ->label('الحالة')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'معلق',
                        'in_progress' => 'قيد المعالجة',
                        'completed' => 'مكتمل',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'in_progress' => 'info',
                        'completed' => 'success',
                    }),
                TextColumn::make('created_at')
                    ->label('تاريخ البلاغ')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListWasteReports::route('/'),
            'create' => Pages\CreateWasteReport::route('/create'),
            'edit' => Pages\EditWasteReport::route('/{record}/edit'),
        ];
    }
}

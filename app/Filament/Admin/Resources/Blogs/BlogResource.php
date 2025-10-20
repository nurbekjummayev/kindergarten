<?php

namespace App\Filament\Admin\Resources\Blogs;

use App\Filament\Admin\Resources\Blogs\Pages\CreateBlog;
use App\Filament\Admin\Resources\Blogs\Pages\EditBlog;
use App\Filament\Admin\Resources\Blogs\Pages\ListBlogs;
use App\Filament\Admin\Resources\Blogs\Pages\ViewBlog;
use App\Filament\Admin\Resources\Blogs\Schemas\BlogForm;
use App\Filament\Admin\Resources\Blogs\Tables\BlogsTable;
use App\Models\Blog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $navigationLabel = 'Bloglar';

    protected static ?string $modelLabel = 'Blog';

    protected static ?string $pluralModelLabel = 'Bloglar';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return BlogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlogsTable::configure($table);
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
            'index' => ListBlogs::route('/'),
            'create' => CreateBlog::route('/create'),
            'view' => ViewBlog::route('/{record}'),
            'edit' => EditBlog::route('/{record}/edit'),
        ];
    }
}

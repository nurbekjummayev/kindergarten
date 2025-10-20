<?php

namespace App\Filament\Organization\Resources\Comments\Pages;

use App\Filament\Organization\Resources\Comments\CommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;
}

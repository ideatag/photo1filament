<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePhoto extends CreateRecord
{
    protected static string $resource = PhotoResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        foreach($data['attachment'] as $image) {
            $model = static::getModel()::create([
                'path' => $image,
                'album_id' => $data['album_id'],
                'user_id' => Auth::id()
            ]);
        }
        return $model;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

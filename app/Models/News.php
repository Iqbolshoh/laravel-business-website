<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['title', 'description', 'image', 'views'];

    public function incrementView()
    {
        $this->increment('views');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($news) {
            $news->deleteImagesFromDescription();

            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('image')) {
                $oldImage = $news->getOriginal('image');
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });
    }

    public function deleteImagesFromDescription()
    {
        $images = $this->extractImages($this->description);

        foreach ($images as $file) {
            $file = str_replace('/storage/', '', parse_url($file, PHP_URL_PATH));
            if (Storage::disk('public')->exists($file)) {
                Storage::disk('public')->delete($file);
            }
        }
    }

    private function extractImages($content): array
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $content, $matches);
        return $matches[1] ?? [];
    }
}

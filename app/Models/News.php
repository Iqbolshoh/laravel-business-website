<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = ['title', 'description', 'image', 'views'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($news) {
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

    public function incrementView()
    {
        $this->increment('views');
    }
}

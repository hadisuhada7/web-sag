<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApkFile extends Model
{
    use HasFactory;

    protected $table = 'apk_files';
    protected $guarded = [];

    protected $casts = [
        'release_date' => 'date',
        'publish'      => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('publish', 1);
    }

    /**
    * File size in a human-readable format (e.g., "24.5 MB"). 
    */
    public function getReadableSizeAttribute()
    {
        $bytes = (int) $this->file_size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 1) . ' MB';
        }
        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }
}

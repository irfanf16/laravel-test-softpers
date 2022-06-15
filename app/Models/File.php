<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class File extends Model
{
    use Notifiable, HasFactory;

    protected $table = 'files';

    public $fillable = [
        'name',
    ];

    public function columns()
    {
        return $this->hasMany(FileColumn::class, 'file_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class FileColumn extends Model
{
    use Notifiable, HasFactory;

    public $fillable = [
        'file_id', 'name'
    ];

    protected $table = 'file_columns';

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    public function datas()
    {
        return $this->hasMany(FileData::class, 'column_id', 'id');
    }
}

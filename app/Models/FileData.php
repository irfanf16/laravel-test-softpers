<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class FileData extends Model
{
    use HasFactory;
    use Notifiable;

    public $fillable = [
        'column_id', 'data'

    ];

    protected $table = 'file_datas';

    public function column()
    {
        return $this->belongsTo(FileColumn::class, 'column_id', 'id');
    }
}

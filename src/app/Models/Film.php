<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

   // (id INTEGER PRIMARY KEY,
   // full_path TEXT,
   // title TEXT,
   // abstract TEXT,
   // actors TEXT, audio TEXT, content TEXT,
   // country TEXT, description TEXT,
   // director TEXT, duration TEXT,
   // episodecount TEXT,
   // episodenum TEXT,
   // format TEXT,
   // fsk TEXT,
   // language TEXT,
   // others TEXT,
   // year TEXT);

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'abstract',
        'actors',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];
}

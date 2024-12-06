<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menus';

    protected $guarded;

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'id_kategori');
    }
}


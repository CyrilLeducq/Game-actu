<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'released_at' => 'date',
        
    ];
/**
 * Definit une relation entre la table games et plateform
 * En php on ferait plutot En PHP => SELECT * FROM movies m INNER JOIN categories c ON c.id = m.category_id;
 */
    public function plateform()
    {
        return $this->belongsTo(Plateform::class);
    }

    
}
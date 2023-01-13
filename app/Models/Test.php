<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * Значения по умолчанию для атрибутов модели.
     *
     * @var array
     */
    protected $attributes = [
        'is_show_answer' => false,
        'created_by' => 1,
        'updated_by' => 1,
    ];

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = ['name', 'is_show_answer'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}

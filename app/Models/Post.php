<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public string $name ='asdasd';
    public int $age;

    /**
     * Mass assignable attributes
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'body'
    ];

    // prevent created_at, updated_at columns from updating
    // public $timestamps = false;

    public function getName()
    {
        return $this->name;
    }
}

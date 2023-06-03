<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QSQL extends Model
{
    use HasFactory;
    // table name sqllog
    protected $table = "sqllog";
    // primary key
    public $primaryKey = "id";
    // timestamps
    public $timestamps = true;
    // columns
    protected $fillable = ["file", "sql", "bindings", "time"];
}

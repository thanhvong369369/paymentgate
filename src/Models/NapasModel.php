<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Napas extends Model{
    protected $table = 'napas';
    protected $fillable = ['name', 'description', 'option'];
}
?>
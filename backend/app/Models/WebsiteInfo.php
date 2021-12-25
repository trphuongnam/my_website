<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteInfo extends Model
{
    use HasFactory;
		protected $fillable = ['website_name', 'short_desc', 'avatar', 'file_url'];
}

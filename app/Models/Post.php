<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;

class Post extends Model
{
    use HasFactory;
    use Commentable;
    use HasUserAvatar;
}

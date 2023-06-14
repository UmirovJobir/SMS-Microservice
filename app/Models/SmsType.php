<?php

namespace App\Models;

use App\Traits\Localization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sms_types';

    protected $fillable = [
        "text",
        "type"
    ];


    public static function getText($request){
        return SmsType::select([Localization::column('text')])->where('type', $request->type)->firstOrFail()->text;
    }
}

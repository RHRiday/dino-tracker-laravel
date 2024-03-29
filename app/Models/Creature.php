<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Creature extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function getPartnerAttribute()
    {
        if ($this->hybrid != null) {
            $hybrid = DB::table('creatures')->where('name', $this->hybrid)->first();
            return $this->name == $hybrid->sp_1 ? $hybrid->sp_2 : $hybrid->sp_1;
        }
        return null;
    }

    public function getMaxableAttribute()
    {
        if ($this->max >= 31 && $this->max < 40) {
            return 1;
        } else {
            $n = $this->shop + ($this->s2 * 2) + ($this->s3 * 4);
            if ($n >= 8 && $this->max < 40) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}

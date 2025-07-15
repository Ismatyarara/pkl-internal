<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'alamat',
        'foto',
    ];

    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/foto/' . $this->foto) : asset('default.png');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_user');
    }
    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_siswa', 'siswa_id', 'kelas_id')->withTimestamps();
    }
    public function pengumpulan()
    {
        return $this->hasMany(\App\Models\PengumpulanTugas::class);
    }

    public function permintaanJoin()
    {
        return $this->hasMany(PermintaanJoin::class);
    }

}

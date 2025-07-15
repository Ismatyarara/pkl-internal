<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'kode_kelas',
        'mata_pelajaran',
        'guru_id',
    ];

    // Relasi: kelas dimiliki oleh satu guru (user)
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_siswa', 'kelas_id', 'siswa_id')->withTimestamps();
    }

    // Relasi: kelas punya banyak tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function permintaanJoin()
    {
        return $this->hasMany(PermintaanJoin::class);
    }

    // (Opsional) kalau nanti ada siswa masuk kelas
    // public function siswa()
    // {
    //     return $this->belongsToMany(User::class, 'kelas_user', 'kelas_id', 'user_id');
    // }
}

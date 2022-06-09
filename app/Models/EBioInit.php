<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBioInit extends Model
{
    use HasFactory;
    use HasFactory;

    /**
   *
   * The table associated with the model
   *
   * @var string
   *
   */
  protected $table = 'e_bio_inits'; //penyata bulanan terkini - kilang oleokimia (initialize - proses 3)
  protected $primaryKey = 'ebio_reg';
  public $timestamps = false;

  protected $fillable = [
      'ebio_reg',
      'ebio_nl',
      'ebio_bln',
      'ebio_thn',
      'ebio_flg',
      'ebio_sdate',
      'ebio_ddate',
      'ebio_a5',
      'ebio_a6',
      'ebio_npg',
      'ebio_jpg',
      'ebio_flagcetak',

  ];

  public function ebiocc(){
    return $this->hasOne(EBioCC::class,'ebio_reg', 'ebio_reg');
}

  public function users(){
    return $this->hasOne(User::class,'ebio_nl', 'username');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $table = 'receipts';
    protected $fillable = ['Receipt_No','Donor_Name','Donor_Mobile','Donor_Pan_No','Donor_Email','Donor_Address','Amount','Payment_Method','Extra'];
}

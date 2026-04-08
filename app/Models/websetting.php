<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class websetting extends Model
{
    use HasFactory;

    protected $table = 'websetting';
    protected $fillable = ['hlogo', 'flogo', 'favicon', 'whatsapp_mobileno', 'call_mobileno', 'address', 'location', 'smtp_port', 'smtp_host', 'smtp_user', 'smtp_password', 'smtp_crypto', 'from', 'receive_inquiry_email', 'cc', 'indexing', 'g_webconsol', 'g_analytics', 'facebook_pixel', 'tawk_content', 'footer_content', 'stripe_key', 'stripe_secret', 'stripe_webhook_secret', 'currency'];
}

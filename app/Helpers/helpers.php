<?php

use App\Events\NewSeedDataCreated;
use Illuminate\Support\Facades\Cache;

if (! function_exists('executeCode')) {
    function executeCode($code)
    {
        try {
            ob_start(); // بدء تخزين الإخراج
            eval("\$result = $code;"); // تنفيذ الكود
            $output = ob_get_clean(); // الحصول على الإخراج
            return $output ?: $result; // إرجاع الإخراج أو النتيجة
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
function clearCache($name)
{
    Cache::forget($name);
}

function generateRandomString($length = 10)
{
    $bytes = random_bytes(ceil($length / 2));
    $hex   = bin2hex($bytes);
    return substr($hex, 0, $length);
}


function formatDate($date, $format = 'Y-m-d H:i:s')
{
    return \Carbon\Carbon::parse($date)->format($format);
}
function createSeed($model, $data)
{
    event(new NewSeedDataCreated($model, $data));
    echo __("success Create new seeder");
}

function isRtl()
{
    return  app()->getLocale() === 'ar';
}



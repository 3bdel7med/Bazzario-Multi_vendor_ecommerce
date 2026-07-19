<?php
namespace App\Services;

use \Log;
use App\Models\Setting;

class SettingsManager{
    protected $settings=[];
    public function __construct()
    {
        $this->settings=Setting::pluck('value','key')->toArray();
        //Log::info('dat stored in cach');

    }
    public function get(string $key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }


}

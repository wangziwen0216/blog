<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Write log file.
     *
     * @var    string
     * @return   array     ['status':,'msg':]
     */
    public function logFile($dir = null, $info = null, $result = null)
    {
        if (!($info && $result && $dir)) return ['status' => true, 'msg' => 'No log Info!'];
        $fileDir = public_path('uploads') . '/' . $dir . '/' . date('Ym') . '/';
        $parent = public_path('uploads') . '/' . $dir . '/';
        if (!is_dir($fileDir)) {
            mkdir($fileDir, 0775, true);
            chmod($parent, 0775);
            chmod($fileDir, 0775);
        }
        $filename = $fileDir . date(Config('time.DATE_FORMAT')) . '.log';
        $now = date(Config('time.TIME_FORMATs'));
        $pid = getmypid();

    }
}

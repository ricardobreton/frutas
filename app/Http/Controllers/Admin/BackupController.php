<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Adapter\Local;

class BackupController extends Controller
{
    function __construct()
    {
        $this->middleware('can:admin.backup.index')->only('index');
        $this->middleware('can:admin.backup.create')->only('create');
        $this->middleware('can:admin.backup.download')->only('download');
        $this->middleware('can:admin.backup.delete')->only('delete');

    }

    public function index()
    {
        // dd(config('backup.backup.destination.disks'));
        if (!count(config('backup.backup.destination.disks'))) {
            dd(trans('backpack::backup.no_disks_configured'));
        }

        $this->data['backups'] = [];
        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $this->data['backups'][] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                        ];
                }
            }
        }

        // reverse the backups, so the newest one would be on top
        $this->data['backups'] = array_reverse($this->data['backups']);
        $this->data['title'] = 'Backups';

        return view('backups.backup', $this->data);
    }

    public function create()
    {
        try {
            ini_set('max_execution_time', 300);
          // start the backup process
            Artisan::call('backup:run',[
                '--only-db' => true
            ]);
        //   $output = Artisan::output();
        //   echo $output;
        } catch (Exception $e) {
            FacadesResponse::make($e->getMessage(), 500);
        }

        return 'success';
    }

    /**
     * Downloads a backup zip file.
     */
    public function download(Request $request)
    {
        $disk = Storage::disk($request->get('disk'));
        $file_name = $request->get('file_name');
        $adapter = $disk->getDriver()->getAdapter();
        if ($adapter instanceof Local) {
            $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();

            if ($disk->exists($file_name)) {
                return response()->download($storage_path.$file_name);
            } else {
                abort(404, 'La copia de seguridad no existe.');
            }
        } else {
            abort(404, 'Solo se permiten descargas del sistema de archivos local.');
        }
    }

    /**
     * Deletes a backup file.
     */
    public function delete(Request $request)
    {
        $file_name=$request->get('file_name');
        $disk = Storage::disk($request->get('disk'));

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            return 'success';
        } else {
            abort(404,' La copia de seguridad no existe.');
        }
    }
}

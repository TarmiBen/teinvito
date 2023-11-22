<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class LogIndex extends Component
{
    use WithPagination;

    public $logData = [];
    public $search = '';
    public $perPage = 10;
    public $selectedLogFile = 'components.log'; // Inicialmente seleccionado "components.log"

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function changeLogFile()
    {
        // Carga los datos del nuevo archivo seleccionado
        $this->loadLogData();
    }

    private function loadLogData()
    {
        // Utiliza $this->selectedLogFile para cargar el archivo seleccionado
        $logFile = storage_path('logs/' . $this->selectedLogFile);
        $logs = file_exists($logFile) ? file($logFile) : [];

        $logData = [];

        foreach ($logs as $log) {
            $fechaEndPos = strpos($log, ']');
            if ($fechaEndPos !== false) {
                $parts = explode(' ', substr($log, 1, $fechaEndPos - 1));
                $fecha = $parts[0]; // Obtiene la fecha

                $restOfLog = substr($log, $fechaEndPos + 1);

                $tipoEndPos = strpos($restOfLog, ':');
                if ($tipoEndPos !== false) {
                    $tipo = trim(substr($restOfLog, 0, $tipoEndPos));
                    $mensaje = trim(substr($restOfLog, $tipoEndPos + 1));

                    $tipo = str_replace('local.', '', $tipo);

                    $logData[] = [
                        'fecha' => $fecha,
                        'tipo' => $tipo,
                        'mensaje' => $mensaje,
                    ];
                }
            }
        }

        $this->logData = collect($logData);
    }

    private function getLogClass($tipo)
    {
        switch ($tipo) {
            case 'ERROR':
                return 'error-bg';
            case 'INFO':
                return 'info-bg';
            case 'WARNING':
                return 'warning-bg';
            case 'DEBUG':
                return 'debug-bg';
            default:
                return '';
        }
    }

    public function clearLogFile()
    {
        $logFile = storage_path('logs/' . $this->selectedLogFile);
        
        if (File::exists($logFile)) {
            File::put($logFile, '');
            
            $this->loadLogData();
        }
    }

    public function render()
    {
        $logData = $this->loadLogData();
        return view('livewire.log-index');
    }
}

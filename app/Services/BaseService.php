<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class BaseService
{
    protected $childClassName = null;

    private function log(string $message = null)
    {
        $this->placeStartLine();

        $this->write($message);

        $this->placeEndLine();
    }

    private function write(string $message)
    {
        Log::channel('services')->info($message);
    }

    private function placeStartLine()
    {
        $message = "\n\nStarted debug from class: ". $this->childClassName ."\n\n";

        $this->write($message);
    }

    private function placeEndLine()
    {
        $message = "\n\nEnded debug from class: ". $this->childClassName ."\n\n";

        $this->write($message);
    }

    public function __call($method, $args = [])
    {
        $this->childClassName = get_class($this);

        return call_user_func_array(array($this, $method), $args);
    }
}
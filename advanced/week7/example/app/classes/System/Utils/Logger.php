<?php namespace System\Utils;

/**
 * Class Logger
 * @package System\Utils
 */
class Logger
{
    private string $errorLog = LOG_PATH . 'error.log';

    /**
     * @var resource
     * @see https://stackoverflow.com/questions/38429595/php-7-and-strict-resource-types
     */
    private $file;

    public function __construct()
    {
        $this->file = fopen($this->errorLog, 'a');
        if ($this->file === false) {
            throw new \Exception('File stream cannot be false for logger.');
        }
    }

    /**
     * @param \Exception $e
     */
    public function error(\Exception $e): void
    {
        $date = date('d-m-Y H:i');
        $message = "[{$date}] {$e->getMessage()} on line {$e->getLine()} of {$e->getFile()}" . PHP_EOL;
        fwrite($this->file, $message);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}

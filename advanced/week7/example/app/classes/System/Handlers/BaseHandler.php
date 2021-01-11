<?php namespace System\Handlers;

use System\Utils\Logger;
use System\Utils\Session;

/**
 * Class BaseHandler
 * @package System\Handlers
 *
 * Dynamic properties to enable auto complete:
 * @property Session $session
 * @property Logger $logger
 */
abstract class BaseHandler
{
    protected string $templatePath;
    protected array $properties = [];
    private array $data = [];
    protected array $errors = [];

    /**
     * BaseHandler constructor.
     *
     * @param string $templateName
     * @throws \ReflectionException
     */
    public function __construct(string $templateName)
    {
        $className = (new \ReflectionClass($this))->getShortName();
        $this->templatePath = str_replace('handler', '', strtolower($className)) . '/' . $templateName;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->properties[$name];
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return self
     *
     * @throws \Exception
     */
    public function __call(string $name, array $arguments): self
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        } else {
            throw new \Exception('Route does not exist');
        }

        return $this;
    }

    /**
     * Use output buffers to capture template data from require statement and store in data
     *
     * @param array $vars
     * @throws \RuntimeException
     */
    protected function renderTemplate(array $vars): void
    {
        if (array_key_exists('content', $vars)) {
            throw new \RuntimeException('Key "content" is forbidden as template variable');
        }
        if (!file_exists(INCLUDES_PATH . 'templates/' . $this->templatePath . '.php')) {
            throw new \RuntimeException("template $this->templatePath does not exist.");
        }
        extract($vars);
        ob_start();
        /** @noinspection PhpIncludeInspection */
        require_once INCLUDES_PATH . 'templates/' . $this->templatePath . '.php';
        $this->data['content'] = ob_get_clean();
        $this->data = array_merge($this->data, $vars);
    }

    /**
     * Return the rendered master template HTML
     *
     * @return string
     * @noinspection PhpUnused
     */
    public function getHTML(): string
    {
        extract($this->data);
        ob_start();
        require_once INCLUDES_PATH . 'templates/master.php';

        return ob_get_clean();
    }
}

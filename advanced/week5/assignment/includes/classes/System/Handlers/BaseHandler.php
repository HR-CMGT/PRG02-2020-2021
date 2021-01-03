<?php namespace System\Handlers;

use System\Utils\Session;

/**
 * Class BaseHandler
 * @package System\Handlers
 */
abstract class BaseHandler
{
    protected string $templateName;
    protected Session $session;
    private array $data;
    protected array $errors = [];

    /**
     * BaseHandler constructor.
     *
     * @param Session $session
     * @throws \ReflectionException
     */
    public function __construct(Session $session)
    {
        $className = (new \ReflectionClass($this))->getShortName();
        $this->templateName = str_replace('handler', '', strtolower($className));
        $this->session = $session;
        $this->initialize();
    }

    /**
     * Every Handler can use this method to do their own magic
     *
     * @return mixed
     */
    abstract public function initialize(): void;

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
        extract($vars);
        ob_start();
        require_once INCLUDES_PATH . 'templates/' . $this->templateName . '.php';
        $this->data['content'] = ob_get_clean();
        $this->data = array_merge($this->data, $vars);
    }

    /**
     * Return the actual data to be used in the main code
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}

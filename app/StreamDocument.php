<?php

namespace App;

use App\Interfaces\Documentable;


class StreamDocument implements Documentable
{
    protected $resource;
    protected $buffer;

    public function __construct($resource, $buffer = 4096)
    {
        $this->resource = $resource;
        $this->buffer = $buffer;
    }

    public function getId()
    {
        // TODO: Implement getId() method.
        return 'resource-' . (int)$this->resource;
    }
    public function getContent()
    {
        // TODO: Implement getContent() method.
        $streamContent = '';
        rewind($this->resource);
        while (feof($this->resource) === false) {
            $streamContent .= fread($this->resource, $this->buffer);
        }
        return $streamContent;
    }

}
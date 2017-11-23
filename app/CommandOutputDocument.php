<?php

namespace App;

use App\Interfaces\Documentable;


class CommandOutputDocument implements Documentable
{
    protected $command;
    public function __construct($command)
    {
        $this->command = $command;
    }
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->command;
    }
    public function getContent()
    {
        // TODO: Implement getContent() method.
        return shell_exec($this->command);
    }

}
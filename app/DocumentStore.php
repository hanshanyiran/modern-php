<?php

namespace App;

use App\Interfaces\Documentable;


class DocumentStore
{
    protected $data =[];

    public function addDocument(Documentable $document)
    {
        $key = $document->getId();
        $value = $document->getContent();
        $this->data[$key] = $value;
    }

    public function getDocuments()
    {
        return $this->data;
    }


}
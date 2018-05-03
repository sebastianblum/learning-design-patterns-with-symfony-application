<?php

namespace App\FileManager;


abstract class AbstractFileMetadata implements FileMetadataInterface
{
    private $size;
    private $realPath;

    public function __construct(int $size, string $realPath)
    {
        $this->size = $size;
        $this->realPath = $realPath;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getRealPath(): string
    {
        return $this->realPath;
    }
}
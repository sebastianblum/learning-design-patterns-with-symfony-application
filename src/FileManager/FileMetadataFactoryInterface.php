<?php

namespace App\FileManager;


interface FileMetadataFactoryInterface
{
    public function load(string $path): FileMetadataInterface;
}
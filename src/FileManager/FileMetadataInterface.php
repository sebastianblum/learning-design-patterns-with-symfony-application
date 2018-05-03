<?php


namespace App\FileManager;


interface FileMetadataInterface
{
    public function getSize(): int;

    public function getRealPath(): string;

    public function getExtras(): array;
}
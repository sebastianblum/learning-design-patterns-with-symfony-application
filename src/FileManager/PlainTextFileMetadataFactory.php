<?php

namespace App\FileManager;


class PlainTextFileMetadataFactory implements FileMetadataFactoryInterface
{
    public function load(string $path): FileMetadataInterface
    {
        if (!is_readable($path)) {
            throw new \InvalidArgumentException(sprintf('File %s is not readable.', $path));
        }

        $fileInfo = new \SplFileInfo($path);

        return new PlainTextFileMetadata(
            $fileInfo->getSize(),
            $fileInfo->getRealPath(),
            count(file($fileInfo->getRealPath()))
        );
    }

}
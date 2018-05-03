<?php

namespace App\FileManager;


class ImageFileMetadataFactory implements FileMetadataFactoryInterface
{
    public function load(string $path): FileMetadataInterface
    {
        if (!is_readable($path)) {
            throw new \InvalidArgumentException(sprintf('File %s is not readable.', $path));
        }

        $fileInfo = new \SplFileInfo($path);
        $imageSize = getimagesize($path);

        return new ImageFileMetadata(
            $fileInfo->getSize(),
            $fileInfo->getRealPath(),
            $imageSize[0],
            $imageSize[1]
        );
    }

}
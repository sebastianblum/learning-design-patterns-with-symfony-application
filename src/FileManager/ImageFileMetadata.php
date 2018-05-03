<?php

namespace App\FileManager;


class ImageFileMetadata extends AbstractFileMetadata implements FileMetadataInterface
{
    private $width;
    private $height;

    public function __construct(int $size, string $realPath, int $width, int $height)
    {
        parent::__construct($size, $realPath);

        $this->width = $width;
        $this->height = $height;
    }


    public function getExtras(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}
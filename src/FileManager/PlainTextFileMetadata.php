<?php

namespace App\FileManager;


class PlainTextFileMetadata extends AbstractFileMetadata implements FileMetadataInterface
{
   private $numberOfLines;

    public function __construct(int $size, string $realPath, int $numberOfLines)
    {
        parent::__construct($size, $realPath);

        $this->numberOfLines = $numberOfLines;
    }


    public function getExtras(): array
    {
        return [
            'numberOfLines' => $this->numberOfLines,
        ];
    }

}
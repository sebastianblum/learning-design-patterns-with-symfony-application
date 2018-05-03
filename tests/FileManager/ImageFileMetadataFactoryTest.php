<?php

namespace App\Tests\FileManager;

use App\FileManager\ImageFileMetadata;
use App\FileManager\ImageFileMetadataFactory;
use PHPUnit\Framework\TestCase;

class ImageFileMetadataFactoryTest extends TestCase
{

    public function testLoad()
    {
        $factory = new ImageFileMetadataFactory();

        $imageFileMetadata = $factory->load(__DIR__.'/fixtures/image.jpg');

        $this->assertInstanceOf(ImageFileMetadata::class, $imageFileMetadata);
        $this->assertSame(33757, $imageFileMetadata->getSize());
        $this->assertSame(__DIR__.'/fixtures/image.jpg', $imageFileMetadata->getRealPath());
        $this->assertSame(['width' => 510, 'height' => 382], $imageFileMetadata->getExtras());
    }
}

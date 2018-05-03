<?php

namespace App\Tests\FileManager;

use App\FileManager\ImageFileMetadata;
use PHPUnit\Framework\TestCase;

class ImageFileMetadataTest extends TestCase
{
    public function testImplementation()
    {
        $imageFileMetadata = new ImageFileMetadata(100, '/tmp/image.jpg', 640, 480);

        $this->assertSame(100, $imageFileMetadata->getSize());
        $this->assertSame('/tmp/image.jpg', $imageFileMetadata->getRealPath());
        $this->assertSame(['width' => 640, 'height' => 480], $imageFileMetadata->getExtras());

    }
}

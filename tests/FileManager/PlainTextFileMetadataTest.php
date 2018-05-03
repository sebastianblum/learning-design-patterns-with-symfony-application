<?php

namespace App\Tests\FileManager;


use App\FileManager\PlainTextFileMetadata;
use PHPUnit\Framework\TestCase;

class PlainTextFileMetadataTest extends TestCase
{
    public function testImplementation()
    {
        $plainTextFileMetadata = new PlainTextFileMetadata(100, '/tmp/filename.txt', 9);

        $this->assertSame(100, $plainTextFileMetadata->getSize());
        $this->assertSame('/tmp/filename.txt', $plainTextFileMetadata->getRealPath());
        $this->assertSame(['numberOfLines' => 9], $plainTextFileMetadata->getExtras());
    }
}

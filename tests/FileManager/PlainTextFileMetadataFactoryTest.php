<?php

namespace App\Tests\FileManager;

use App\FileManager\PlainTextFileMetadata;
use App\FileManager\PlainTextFileMetadataFactory;
use PHPUnit\Framework\TestCase;

class PlainTextFileMetadataFactoryTest extends TestCase
{
    public function testLoad()
    {
        $factory = new PlainTextFileMetadataFactory();

        $plainTextFileMetadata = $factory->load(__DIR__.'/fixtures/plaintext.txt');

        $this->assertInstanceOf(PlainTextFileMetadata::class, $plainTextFileMetadata);
        $this->assertSame(15, $plainTextFileMetadata->getSize());
        $this->assertSame(__DIR__.'/fixtures/plaintext.txt', $plainTextFileMetadata->getRealPath());
        $this->assertSame(['numberOfLines' => 2], $plainTextFileMetadata->getExtras());
    }
}

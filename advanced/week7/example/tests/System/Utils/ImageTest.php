<?php namespace System\Utils;

use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package System\Utils
 */
class ImageTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $_FILES = [
            'image' => [
                'name' => 'test.jpg',
                'tmp_name' => __DIR__ . '/../../images/test.jpg',
                'type' => 'image/jpeg',
                'size' => 57,
                'error' => 0
            ]
        ];
    }

    public function testSave(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Failed to move uploaded file.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveSize(): void
    {
        $_FILES['image']['size'] = 100000000;
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Exceeded filesize limit.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveSizeStatus1(): void
    {
        $_FILES['image']['error'] = 1;
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Exceeded filesize limit.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveSizeStatus2(): void
    {
        $_FILES['image']['error'] = 2;
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Exceeded filesize limit.');
        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveUnknownErrors(): void
    {
        $_FILES['image']['error'] = 3;
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unknown errors.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveNoFile(): void
    {
        $_FILES['image']['error'] = 4;
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('No file sent.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }

    public function testSaveInvalidFormat(): void
    {
        $_FILES['image']['tmp_name'] = __DIR__ . '/../../images/fake.jpg';
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Invalid file format.');

        $image = new Image();
        $this->assertStringEndsWith($_FILES['image']['name'], $image->save($_FILES['image']));
    }
}

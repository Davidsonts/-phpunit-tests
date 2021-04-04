<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
# Import Box class
use App\Models\Box;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    # Test function for Box class
    public function testBoxContents()
    {
        // preparação
        $array = ['toy'];

        // execução
        $box = new Box($array);

        // verificações
        $this->assertTrue($box->has('toy'));
        $this->assertFalse($box->has('ball'));
    }

    public function testTakeOneFromTheBox()
    {
        // preparação
        $array = ['torch'];

        // execução
        $box = new Box($array);

        // verificações
        $this->assertEquals('torch', $box->takeOne());  // var_dump($box->takeOne());
        // Null, now the box is empty
        $this->assertNull($box->takeOne());
    }

    public function testStartsWithALetter()
    {
        // preparação (preparar os dados)
        $box = new Box(['toy', 'torch', 'ball', 'cat', 'tissue']);

        // execução (chamar o método a ser testado)
        $results = $box->startsWith('t');

        // verificações (verificar o resultado da execução (asserções))
        $this->assertCount(3, $results);
        $this->assertContains('toy', $results);
        $this->assertContains('torch', $results);
        $this->assertContains('tissue', $results);

        // Empty array if passed even
        // $this->assertEmpty($box->startsWith('s'));
    }
}

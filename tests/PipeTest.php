<?php

namespace GNAHotelSolutions\Pipe\Tests;

use GNAHotelSolutions\Pipe\Pipe;
use PHPUnit\Framework\TestCase;

class PipeTest extends TestCase
{

    public function test_it_can_chain_operations(): void
    {
        $this->assertEquals('GNAHOTELSOLUTIONS',
            (new Pipe('gna hotel solutions'))
                ->then(fn($str) => strtoupper($str))
                ->then(fn($str) => str_replace(' ', '', $str))
                ->get()
        );
    }

    public function test_it_can_use_string_instead_of_closure(): void
    {
        $this->assertEquals('GNAHOTELSOLUTIONS',
            (new Pipe('gnahotelsolutions'))
                ->then('strtoupper')
                ->get()
        );
    }
}

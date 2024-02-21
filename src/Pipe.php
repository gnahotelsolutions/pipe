<?php

namespace GNAHotelSolutions\Pipe;

class Pipe
{

    public function __construct(private $value) {}

    public function then(\Closure|string $closure): self
    {
        $this->value = $closure($this->value);

        return $this;
    }

    public function dump(?\Closure $closure = null): self
    {
        if ($closure !== null) {
            dump($closure($this->value));
        } else {
            dump($this->value);
        }

        return $this;
    }

    public function get()
    {
        return $this->value;
    }

    public function clone(): self
    {
        return new self($this->value);
    }
}

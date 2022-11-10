<?php

class Card
{
    private string $suit;
    private string $value;

    public function __construct($suit, $value)
    {
        try {
            if ($this->validate($suit, $value)) {
                $this->suit = $suit;
                $this->value = $value;
            } else {
                $this->suit = "";
                $this->value = "";
                throw new InvalidArgumentException("Error, value: $value of suit $suit klopt niet!");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function validate($suit, $value): bool
    {
        if ($suit == "♣" || $suit == "♥" || $suit == "♦" || $suit == "♠") {
            if ($value <= 10 || $value == 'A' || $value == 'J' || $value == 'Q' || $value == 'K') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function show(): string
    {
        return "$this->suit$this->value";
    }
}

<?php

include('Card.php');

class Deck
{
    private array $cards = [];

    public function __construct()
    {
        $suits = ["♣", "♥", "♦", "♠"];
        $values = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "A", "J", "K", "Q"];

        foreach ($suits as $suit) {
            foreach ($values as $value) {
                $this->cards[] = new Card($suit, $value);
            }
        }
    }

    public function drawCard(): Card
    {
        try {
            if (count($this->cards) == 0) {
                throw new Exception("Het deck is leeg!");
            } else {
                $rand = array_rand($this->cards);
                $card = $this->cards[$rand];
                unset($this->cards[$rand]);

                return $card;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

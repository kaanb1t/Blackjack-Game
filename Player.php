<?php

require_once('Blackjack.php');

class Player
{
    private string $name;
    private array $hand = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addCard(Card $card)
    {
        $this->hand[] = $card;
    }

    public function showHand(): string
    {
        $value = "";
        foreach ($this->hand as $card) {
            $value .= $card->show() . " ";
        }
        return $this->name . " heeft $value";
    }

    public function getScore()
    {
        $blackjack = new Blackjack();
        return $blackjack->scoreHand($this->hand);
    }

    public function getWinner()
    {
        $blackjack = new Blackjack();
        return $blackjack->winner($this->hand);
    }

    public function getName()
    {
        return $this->name;
    }
}

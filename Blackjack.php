<?php

class Blackjack
{
    public function winner($hand)
    {
        foreach ($hand as $card) {
            $cards[] = explode(" ", $card->show());
        }
        $total = 0;
        foreach ($cards as $value) {
            foreach ($value as $value) {
                if (strpos($value, 'K') || strpos($value, 'Q') || strpos($value, 'J')) {
                    $total = $total + 10;
                } else if (strpos($value, 'A')) {
                    $total = $total + 11;
                } else {
                    preg_match_all('!\d+!', $value, $matches);
                    foreach ($matches as $match) {
                        foreach ($match as $matches) {
                            $total = $total + $matches;
                        }
                    }
                }
            }
        }
        return 21 - $total;
    }

    public function scoreHand(array $hand): string
    {
        foreach ($hand as $card) {
            $cards[] = explode(" ", $card->show());
        }
        $total = 0;
        foreach ($cards as $value) {
            foreach ($value as $value) {
                if (strpos($value, 'K') || strpos($value, 'Q') || strpos($value, 'J')) {
                    $total = $total + 10;
                } else if (strpos($value, 'A')) {
                    $total = $total + 11;
                } else {
                    preg_match_all('!\d+!', $value, $matches);
                    foreach ($matches as $match) {
                        foreach ($match as $matches) {
                            $total = $total + $matches;
                        }
                    }
                }
            }
        }

        if ($total == 21) {
            if (count($hand) == 2) {
                return "Blackjack";
            } else {
                return "Twenty-One";
            }
        } else if ($total > 21) {
            return "Busted";
        } else if (count($hand) >= 5 && $total < 21) {
            return "Five Card Charlie";
        } else {
            return "";
        }
    }
}

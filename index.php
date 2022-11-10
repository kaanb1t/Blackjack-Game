<?php

require_once("Deck.php");
require_once("Player.php");

$winners = [];
$game = true;

$deck = new Deck();

echo "Welkom bij blackjack! " . PHP_EOL;
echo "Met hoeveel spelers wil je spelen? " . PHP_EOL;
$aantal = readline();

for ($i = 0; $i < $aantal; $i++) {
    echo "Wat is de naam van speler " . $i + 1 . "?: ";
    $naam = readline();
    $players[] = new Player($naam);
    $players[$i]->addCard($deck->drawCard());
    $players[$i]->addCard($deck->drawCard());
    echo "\n";
}

$speler = false;

while ($game) {
    for ($i = 0; $i <= $aantal; $i++) {
        if ($i >= $aantal) {
            $game = false;
        } else {
            $speler = true;
            while ($speler) {
                switch ($players[$i]->getScore()) {
                    case "Busted":
                        echo "Je bent BUSTED en hebt verloren!" . PHP_EOL;
                        $speler = false;
                        unset($players[$i]);
                        break;
                    case "Blackjack":
                        echo "Je hebt BLACKJACK en hebt gewonnen!" . PHP_EOL;
                        $winners[] = $players[$i]->getName();
                        $speler = false;
                        break;
                    case "Twenty-One":
                        echo "Je hebt Twenty-One en hebt gewonnen!" . PHP_EOL;
                        $winners[] = $players[$i]->getName();
                        $speler = false;
                        break;
                    case "Five Card Charlie":
                        echo "Je hebt Five Card Charlie en hebt gewonnen!" . PHP_EOL;
                        $winners[] = $players[$i]->getName();
                        $speler = false;
                        break;
                }

                if (!$speler) {
                    break;
                }

                echo $players[$i]->showHand() . PHP_EOL;
                echo "Wil je een nieuwe kaart of stoppen?" . PHP_EOL;
                echo "Kies: /kaart of /stoppen" . PHP_EOL;

                $option = false;
                while (!$option) {
                    $optie = readline();
                    if ($optie == "/kaart") {
                        $players[$i]->addCard($deck->drawCard());
                        $option = true;
                        break;
                    } else if ($optie == "/stoppen") {
                        echo "Je bent gestopt!" . PHP_EOL;
                        $speler = false;
                        break;
                    } else {
                        echo "Je moet /kaart of /stoppen typen!" . PHP_EOL;
                    }
                }
            }
        }
    }
}

if (count($winners) == 0) {
    for ($i = 0; $i < count($players); $i++) {
        $spelers[$players[$i]->getName()] = $players[$i]->getWinner();
    }
    echo array_keys($spelers, min($spelers))[0] . " Heeft gewonnen";
} else {
    foreach ($winners as $winner) {
        echo "$winner heeft gewonnen!" . PHP_EOL;
    }
}

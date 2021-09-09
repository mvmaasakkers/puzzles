<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day16 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $aunts = $this->parseInput($input);
        $searchAunt = new Aunt(0, [
            'children' => 3,
            'cats' => 7,
            'samoyeds' => 2,
            'pomeranians' => 3,
            'akitas' => 0,
            'vizslas' => 0,
            'goldfish' => 5,
            'trees' => 3,
            'cars' => 2,
            'perfumes' => 1,
        ]);


        return array_values(array_filter($aunts, static function (Aunt $aunt) use ($searchAunt) {
            return
                ($aunt->getChildren() === $searchAunt->getChildren() || $aunt->getChildren() === null) &&
                ($aunt->getCats() === $searchAunt->getCats() || $aunt->getCats() === null) &&
                ($aunt->getSamoyeds() === $searchAunt->getSamoyeds() || $aunt->getSamoyeds() === null) &&
                ($aunt->getPomeranians() === $searchAunt->getPomeranians() || $aunt->getPomeranians() === null) &&
                ($aunt->getAkitas() === $searchAunt->getAkitas() || $aunt->getAkitas() === null) &&
                ($aunt->getVizslas() === $searchAunt->getVizslas() || $aunt->getVizslas() === null) &&
                ($aunt->getGoldfish() === $searchAunt->getGoldfish() || $aunt->getGoldfish() === null) &&
                ($aunt->getTrees() === $searchAunt->getTrees() || $aunt->getTrees() === null) &&
                ($aunt->getCars() === $searchAunt->getCars() || $aunt->getCars() === null) &&
                ($aunt->getPerfumes() === $searchAunt->getPerfumes() || $aunt->getPerfumes() === null);
        }))[0]->getNumber();
    }

    public function part2(DefaultInput|InputInterface $input): mixed
    {
        $aunts = $this->parseInput($input);
        $searchAunt = new Aunt(0, [
            'children' => 3,
            'cats' => 7,
            'samoyeds' => 2,
            'pomeranians' => 3,
            'akitas' => 0,
            'vizslas' => 0,
            'goldfish' => 5,
            'trees' => 3,
            'cars' => 2,
            'perfumes' => 1,
        ]);

        return array_values(array_filter($aunts, static function (Aunt $aunt) use ($searchAunt) {
            return
                ($aunt->getChildren() === $searchAunt->getChildren() || $aunt->getChildren() === null) &&
                ($aunt->getCats() > $searchAunt->getCats() || $aunt->getCats() === null) &&
                ($aunt->getSamoyeds() === $searchAunt->getSamoyeds() || $aunt->getSamoyeds() === null) &&
                ($aunt->getPomeranians() < $searchAunt->getPomeranians() || $aunt->getPomeranians() === null) &&
                ($aunt->getAkitas() === $searchAunt->getAkitas() || $aunt->getAkitas() === null) &&
                ($aunt->getVizslas() === $searchAunt->getVizslas() || $aunt->getVizslas() === null) &&
                ($aunt->getGoldfish() < $searchAunt->getGoldfish() || $aunt->getGoldfish() === null) &&
                ($aunt->getTrees() > $searchAunt->getTrees() || $aunt->getTrees() === null) &&
                ($aunt->getCars() === $searchAunt->getCars() || $aunt->getCars() === null) &&
                ($aunt->getPerfumes() === $searchAunt->getPerfumes() || $aunt->getPerfumes() === null);
        }))[0]->getNumber();
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static function ($line) {
            $colonPos = strpos($line, ':');
            $suePart = trim(substr($line, 0, $colonPos));
            sscanf($suePart, 'Sue %d', $sueNumber);
            $restPart = explode(', ', trim(substr($line, $colonPos + 1)));
            $opts = [];
            foreach ($restPart as $pr) {
                $prPart = explode(': ', $pr);
                $opts[$prPart[0]] = (int)$prPart[1];
            }


            return new Aunt($sueNumber, $opts);
        }, $input->getSplitTrimLines());
    }
}

class Aunt
{
    private int $number;
    private ?int $children = null;
    private ?int $cats = null;
    private ?int $samoyeds = null;
    private ?int $pomeranians = null;
    private ?int $akitas = null;
    private ?int $vizslas = null;
    private ?int $goldfish = null;
    private ?int $trees = null;
    private ?int $cars = null;
    private ?int $perfumes = null;

    public function __construct(int $number, array $opts = [])
    {
        $this->setNumber($number);

        foreach ($opts as $k => $v) {
            switch ($k) {
                case "children":
                    $this->setChildren($v);
                    break;
                case "cats":
                    $this->setCats($v);
                    break;
                case "samoyeds":
                    $this->setSamoyeds($v);
                    break;
                case "pomerians":
                    $this->setPomeranians($v);
                    break;
                case "akitas":
                    $this->setAkitas($v);
                    break;
                case "vizslas":
                    $this->setVizslas($v);
                    break;
                case "goldfish":
                    $this->setGoldfish($v);
                    break;
                case "trees":
                    $this->setTrees($v);
                    break;
                case "cars":
                    $this->setCars($v);
                    break;
                case "perfumes":
                    $this->setPerfumes($v);
                    break;
            }
        }
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Aunt
     */
    public function setNumber(int $number): Aunt
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getChildren(): ?int
    {
        return $this->children;
    }

    /**
     * @param int|null $children
     * @return Aunt
     */
    public function setChildren(?int $children): Aunt
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCats(): ?int
    {
        return $this->cats;
    }

    /**
     * @param int|null $cats
     * @return Aunt
     */
    public function setCats(?int $cats): Aunt
    {
        $this->cats = $cats;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSamoyeds(): ?int
    {
        return $this->samoyeds;
    }

    /**
     * @param int|null $samoyeds
     * @return Aunt
     */
    public function setSamoyeds(?int $samoyeds): Aunt
    {
        $this->samoyeds = $samoyeds;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPomeranians(): ?int
    {
        return $this->pomeranians;
    }

    /**
     * @param int|null $pomeranians
     * @return Aunt
     */
    public function setPomeranians(?int $pomeranians): Aunt
    {
        $this->pomeranians = $pomeranians;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAkitas(): ?int
    {
        return $this->akitas;
    }

    /**
     * @param int|null $akitas
     * @return Aunt
     */
    public function setAkitas(?int $akitas): Aunt
    {
        $this->akitas = $akitas;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVizslas(): ?int
    {
        return $this->vizslas;
    }

    /**
     * @param int|null $vizslas
     * @return Aunt
     */
    public function setVizslas(?int $vizslas): Aunt
    {
        $this->vizslas = $vizslas;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGoldfish(): ?int
    {
        return $this->goldfish;
    }

    /**
     * @param int|null $goldfish
     * @return Aunt
     */
    public function setGoldfish(?int $goldfish): Aunt
    {
        $this->goldfish = $goldfish;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrees(): ?int
    {
        return $this->trees;
    }

    /**
     * @param int|null $trees
     * @return Aunt
     */
    public function setTrees(?int $trees): Aunt
    {
        $this->trees = $trees;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCars(): ?int
    {
        return $this->cars;
    }

    /**
     * @param int|null $cars
     * @return Aunt
     */
    public function setCars(?int $cars): Aunt
    {
        $this->cars = $cars;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPerfumes(): ?int
    {
        return $this->perfumes;
    }


    /**
     * @param int|null $perfumes
     * @return Aunt
     */
    public function setPerfumes(?int $perfumes): Aunt
    {
        $this->perfumes = $perfumes;
        return $this;
    }
}


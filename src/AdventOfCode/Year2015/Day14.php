<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day14 extends AdventOfCode
{
    private function parseInput(DefaultInput $input): array
    {
        return array_map(static function ($line) {
            [
                $name,
                $speed,
                $seconds,
                $rest
            ] = sscanf($line, '%s can fly %d km/s for %d seconds, but then must rest for %d seconds.');
            return [
                'name' => $name,
                'speed' => $speed,
                'seconds' => $seconds,
                'rest' => $rest
            ];
        }, $input->getSplitTrimLines());
    }

    public function part1(DefaultInput|InputInterface $input): mixed
    {
        return max(array_map(static function ($reindeer) {
            return $reindeer['distance'];
        }, $this->calculate($this->parseInput($input), $input->getOptions()['seconds'])));

    }

    public function part2(DefaultInput|InputInterface $input): mixed
    {
        return max(array_map(static function ($reindeer) {
            return $reindeer['score'];
        }, $this->calculate($this->parseInput($input), $input->getOptions()['seconds'])));
    }

    /**
     * @param array $reindeers
     * @param mixed $maxSeconds
     * @return array
     */
    private function calculate(array $reindeers, mixed $maxSeconds): array
    {
        $reindeerTimes = [];
        foreach ($reindeers as $reindeer) {
            $reindeerTimes[$reindeer['name']] = [
                'resting' => false,
                'totalTime' => 0,
                'relativeTime' => 0,
                'distance' => 0,
                'restTime' => $reindeer['rest'],
                'travelTime' => $reindeer['seconds'],
                'speed' => $reindeer['speed'],
                'score' => 0,
            ];
        }
        for ($i = 0; $i < $maxSeconds; $i++) {
            foreach ($reindeerTimes as $name => $reindeer) {
                $maxStageTime = $reindeer['resting'] ? $reindeer['restTime'] : $reindeer['travelTime'];
                if ($reindeer['relativeTime'] === $maxStageTime) {
                    if ($reindeer['resting'] === true) {
                        $reindeerTimes[$name]['resting'] = false;
                    } elseif ($reindeer['resting'] === false) {
                        $reindeerTimes[$name]['resting'] = true;
                    }
                    $reindeerTimes[$name]['relativeTime'] = 0;
                }

                $reindeerTimes[$name]['totalTime'] = $i;
                $reindeerTimes[$name]['relativeTime']++;

                if ($reindeerTimes[$name]['resting'] === false) {
                    $reindeerTimes[$name]['distance'] += $reindeer['speed'];
                }
            }

            $maxR = [];
            foreach ($reindeerTimes as $k => $v) {
                $maxR[$k] = $v['distance'];
            }

            $max = max($maxR);
            foreach ($reindeerTimes as $k => $r) {
                if ($r['distance'] === $max) {
                    $reindeerTimes[$k]['score']++;
                }
            }
        }
        return $reindeerTimes;
    }
}


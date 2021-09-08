<?php

namespace App\Maker;

use Symfony\Bundle\MakerBundle\ConsoleStyle;
use Symfony\Bundle\MakerBundle\DependencyBuilder;
use Symfony\Bundle\MakerBundle\Generator;
use Symfony\Bundle\MakerBundle\InputConfiguration;
use Symfony\Bundle\MakerBundle\Maker\AbstractMaker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;

class MakeAocCommand extends AbstractMaker
{
    public static function getCommandName(): string
    {
        return 'make:aoc';
    }

    public static function getCommandDescription(): string
    {
        return 'Creates a new AoC setup';
    }

    public function configureCommand(Command $command, InputConfiguration $inputConf)
    {
        $command
            ->addArgument('year', InputArgument::REQUIRED, 'What year? (e.g. <fg=yellow>2015</>)')
            ->addArgument('day', InputArgument::REQUIRED, 'What day? (e.g. <fg=yellow>06</>)');
    }

    public function generate(InputInterface $input, ConsoleStyle $io, Generator $generator)
    {
        $day = sprintf('%02d', (int)$input->getArgument('day'));
        $dayClass = sprintf('Day%s', $day);
        $year = sprintf('%d', $input->getArgument('year'));
        $yearClass = sprintf('Year%s', $year);

        $dayClassNameDetails = $generator->createClassNameDetails(
            sprintf('Day%s', $day),
            sprintf('AdventOfCode\\Year%s\\', $year),
        );

        $generator->generateClass(
            $dayClassNameDetails->getFullName(),
            'src/Resources/skeleton/aoc.tpl.php',
            []
        );

        $dayTestClassNameDetails = $generator->createClassNameDetails(
            $dayClass,
            sprintf('Tests\\AdventOfCode\\%s\\', $yearClass),
            'Test'
        );

        $generator->generateClass(
            $dayTestClassNameDetails->getFullName(),
            'src/Resources/skeleton/aoc_test.tpl.php',
            [
                'day' => $dayClass,
                'year' => $yearClass,
            ]
        );

        $generator->writeChanges();

        $this->writeSuccessMessage($io);
        $io->text([
            'Next: finish the puzzle',
        ]);
    }

    public function configureDependencies(DependencyBuilder $dependencies)
    {

    }
}

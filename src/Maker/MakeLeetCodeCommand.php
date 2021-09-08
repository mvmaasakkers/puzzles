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

class MakeLeetCodeCommand extends AbstractMaker
{
    public static function getCommandName(): string
    {
        return 'make:leetcode';
    }

    public static function getCommandDescription(): string
    {
        return 'Creates a new LeetCode setup';
    }

    public function configureCommand(Command $command, InputConfiguration $inputConf)
    {
        $command
            ->addArgument('number', InputArgument::REQUIRED, 'What number? (e.g. <fg=yellow>123</>)');
    }

    public function generate(InputInterface $input, ConsoleStyle $io, Generator $generator)
    {
        $number = sprintf('%04d', (int)$input->getArgument('number'));
        $numberClass = sprintf('Solution%s', $number);

        $dayClassNameDetails = $generator->createClassNameDetails(
            $numberClass,
            'LeetCode\\Puzzles\\',
        );

        $generator->generateClass(
            $dayClassNameDetails->getFullName(),
            'src/Resources/skeleton/leetcode.tpl.php',
            []
        );

        $dayTestClassNameDetails = $generator->createClassNameDetails(
            $numberClass,
            sprintf('Tests\\LeetCode\\Puzzles\\'),
            'Test'
        );

        $generator->generateClass(
            $dayTestClassNameDetails->getFullName(),
            'src/Resources/skeleton/leetcode_test.tpl.php',
            [
                'numberClass' => $numberClass,
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

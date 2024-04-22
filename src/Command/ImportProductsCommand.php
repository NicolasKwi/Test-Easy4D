<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit;
use League\Csv\Reader;

class ImportProductsCommand extends Command
{
    protected static $defaultName = 'app:import-products';
    private $entityManager;
    private $validator;
    private $projectDir;

    public function __construct(EntityManagerInterface $entityManager, ValidatorInterface $validator, ParameterBagInterface $params)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->validator = $validator;
        $this->projectDir = $params->get('kernel.project_dir');
    }

    protected function configure()
    {
        $this
            ->setDescription('Importe des produits à partir de fichiers CSV.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $io = new SymfonyStyle($input, $output);
            $importDir = $this->projectDir . '/import';
            $erreurDir = $this->projectDir . '/import/erreur';
            $files = scandir($importDir);

            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_EXTENSION) === 'csv') {
                    $filePath = $importDir . '/' . $file;
                    $csv = Reader::createFromPath($filePath, 'r');
                    $csv->setDelimiter(';');
                    $csv->setHeaderOffset(0);
                    $results = $csv->getRecords();

                    $errorCount = 0;
                    foreach ($results as $row) {
                        $product = new Produit();
                        // Set les propriétés du produit.
                        $product->setEasy4DCode($row['Easy4D Code'] ?? '');
                        $product->setEANCode($row['EAN Code'] ?? '');
                        $product->setDesignation($row['Designation'] ?? '');
                        $product->setCategoryTyreName($row['Category  tyre name'] ?? '');
                        $product->setBrandName($row['Brand name'] ?? '');
                        $product->setFamilyName($row['Family name'] ?? '');
                        $product->setWidth($row['Width'] ?? '');
                        $product->setHeight($row['Height'] ?? '');
                        $product->setDiameter($row['diameter'] ?? '');
                        $product->setConstruction($row['Construction'] ?? '');
                        $product->setLoadIndex($row['Load index'] ?? '');
                        $product->setSpeedIndex($row['Speed index'] ?? '');
                        $product->setSegment($row['Segment'] ?? '');

                        $errors = $this->validator->validate($product);
                        if (count($errors) > 0) {
                            $errorCount++;
                            if ($errorCount > 3) {
                                $io->error("L'importation a été interrompue en raison de trop nombreuses erreurs(" . $errorCount . ").");
                                $newLocation = $erreurDir . '/' . $file;
                                rename($filePath, $newLocation);
                                $io->note('Le fichier ' . $file . 'a été déplacé vers le dossier erreur.');
                                continue 2; // Passe au fichier suivant.
                            }
                            continue;
                        }
                        $this->entityManager->persist($product);
                    }

                    $this->entityManager->flush();
                    $io->success('Les produits du fichier ' . $file . ' ont été importés avec succès.');
                }
            }

            return Command::SUCCESS;
        } catch (\Exception $e) {
            echo 'Erreur -app:import-products- lors de la lecture du fichier CSV : ', $e->getMessage();
        }
    }
}

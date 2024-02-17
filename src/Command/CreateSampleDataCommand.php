<?php

namespace App\Command;

use App\Entity\Enum\LanguageEnum;
use App\Entity\GeneralData;
use App\Entity\PageSeo;
use App\Repository\GeneralDataRepository;
use App\Repository\PageSeoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-sample-data',
    description: 'Criar dados iniciar para o sistema',
)]
class CreateSampleDataCommand extends Command
{
    public function __construct(private GeneralDataRepository $generalDataRepository, private PageSeoRepository $pageSeoRepository, private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach (LanguageEnum::getOptions() as $index => $option) {
            $pageSeo = $this->pageSeoRepository->findOneBy(['language'=>$option]);

            if ($pageSeo)
            {
                $io->writeln('Page Seo em '.$index.' <comment> já exite</comment>');
            } else {

                $io->writeln('Page Seo em '.$index.' <info>criada</info>');

                $pageSeo = new PageSeo();
                $pageSeo->setHomePageTitle('Titulo da página');
                $pageSeo->setHomePageDescription('Descrição da página da página');
                $pageSeo->setAboutUsPageTitle('Titulo da página');
                $pageSeo->setAboutUsPageDescription('Descrição da página da página');
                $pageSeo->setProductListingPageTitle('Titulo da página');
                $pageSeo->setProductListingPageDescription('Descrição da página da página');
                $pageSeo->setNewsListingPageTitle('Titulo da página');
                $pageSeo->setNewsListingPageDescription('Descrição da página da página');
                $pageSeo->setServiceListingPageTitle('Titulo da página');
                $pageSeo->setServiceListingPageDescription('Descrição da página da página');
                $pageSeo->setFinancingListPageTitle('Titulo da página');
                $pageSeo->setFinancingListPageDescription('Descrição da página da página');
                $pageSeo->setVideoListingPageTitle('Titulo da página');
                $pageSeo->setVideoListingPageDescription('Descrição da página da página');
                $pageSeo->setLanguage($option);

                $this->em->persist($pageSeo);
                $this->em->flush();
            }
        }


        $generalData = $this->generalDataRepository->find(1);
        if ($generalData)
        {
            $io->writeln('General Data '.$index.' <comment> já exite</comment>');
        } else {
            $io->writeln('General Data '.$index.' <info>criada</info>');
            $generalData = new GeneralData();
            $generalData->setEmail('email@dominio.com.br');
            $generalData->setAddress('Rua X, 123');
            $generalData->setPhone('(11) 3333-2222');

            $this->em->persist($generalData);
            $this->em->flush();
        }




        $io->success('Dados injetados com sucesso.');

        return Command::SUCCESS;
    }
}

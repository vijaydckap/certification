<?php


namespace July\SampleCommands\Console\Command;

use LogicException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ModuleList extends \Symfony\Component\Console\Command\Command
{
    private $moduleList;

    public function __construct(
        \Magento\Framework\Module\ModuleListInterface $moduleList,
        $name = null
    )
    {
        parent::__construct($name);
        $this->moduleList = $moduleList;
    }

    protected function configure()
    {
        $this->setName("July:list")->setDescription("This list showing all july modules names with separate of comma.")
            ->addArgument('name', \Symfony\Component\Console\Input\InputArgument::OPTIONAL, 'Name of the module')
            ->addOption("module_version", '-m', \Symfony\Component\Console\Input\InputOption::VALUE_OPTIONAL, 'version of the module');
//            ->addOption("module_version", '-m', 4, 'version of the module');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
//        throw new LogicException("You Must override the execute() method modules with comma.");
        $output->writeln("Listing Enabled Modules");
        $moduleNames = $this->moduleList->getNames();
        $moduleName = $input->getArgument("name");
        $module_version = $input->getOption("module_version");
//        $module_version = $input->hasOption("module_version");
        if ($moduleName) {
            if (in_array($moduleName, $moduleNames)) {
                $output->writeln("Yes");
                if ($module_version) {
                    $output->writeln("Version: " . $this->moduleList->getOne($moduleName)['setup_version']);
                }
            } else {
                $output->write("No");
            }
        } else {
            foreach ($moduleNames as $name) {
                $output->write($name . ",");
            }
        }
        $output->writeln("done");
    }
}
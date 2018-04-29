<?php
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateController extends Command
{   
    protected $controllerTemplate = CmdTemplates . '/ControllerNew.tpl';
    protected $commandName = 'make:controller';
    protected $commandDescription = "Create New Controller";

    protected $commandArgumentName = null;
    protected $commandArgumentDescription = "Do you want to create a new Controller?";

    protected $commandOptionName = "des"; // should be specified like "app:greet John --cap"
    protected $commandOptionDescription = 'Just to create new Controller class';    

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::OPTIONAL,
                $this->commandArgumentDescription
            )
            ->addOption(
               $this->commandOptionName,
               null,
               InputOption::VALUE_NONE,
               $this->commandOptionDescription
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

         $controlerName = trim($input->getArgument($this->commandArgumentName));  

         $output->writeln("------------------ Create new Controller ----------------");

           $exc =   $this->newController($controlerName);

           $output->writeln($exc);        

    }

    public function newController($controllerName) {

      $controllerFile = strtolower($controllerName);
      $controllerPath = APP_PATH . '/controllers/' . $controllerFile . '.php';

      if(!file_exists($controllerPath)) {

           $getTemplate = file_get_contents($this->controllerTemplate);

           $newTemplate = preg_replace('/{{ControlerName}}/', ucfirst($controllerName), $getTemplate);
          
          //Excuting create new controller by copying template
        $excNew = fopen(APP_PATH . '/controllers/' . $controllerFile . '.php', 'w');

        $overwrite =  fwrite($excNew, $newTemplate);

        if ($overwrite) {
            return "
                SUCCESSED: The controller [{$controllerName}] has been created!
            ";
        } else {

            return "
        Failed: Cannot create Controller [{$controllerName}], this controller already exists!
        Please check the permissions to on folder /App/controllers to access create new file.
        ";
        }


      }else {

        return "
        Failed: Cannot create Controller [{$controllerName}], this controller already exists!
        ";

      }


    }
}
<?php
/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-04
 * Time: 10:40.
 */

namespace app\CommandPattern;

/*****************************************
 * Pour l'utilisation de CommandPattern
 *
 *  1. Créer une instance de la commande concrète voulu
 *  2. Créer une instance de l'Invoker
 *  3. Appeler la méthode de l'Invoker en lui passant l'instance de la commande concrète
 *
 * ***************************************
 */
class Invoker
{
    public function addCommand(AbstractCommand $command)
    {
        $command->add();
    }
    public function removeCommand(AbstractCommand $command)
    {
        $command->remove();
    }
    public function viewCommand(AbstractCommand $command)
    {
        $command->view();
    }
    public function saveCommand(AbstractCommand $command)
    {
        $command->save();
    }
}

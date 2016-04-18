<?php
/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-04
 * Time: 10:46.
 */

namespace app\CommandPattern;

/*****************************************
 * Pour l'ajout d'un nouvel élément (Document par exemple)
 *
 *  1. Créer un fichier DocumentCommand dans le répertoire CommandPattern
 *  2. Cette classe doit hériter de la classe AbstractCommand
 *  3. Implémenter les méthodes abstraites de la classe AbstractCommand
 *
 * ***************************************
 */
abstract class AbstractCommand
{
    abstract public function add();
    abstract public function remove();
    abstract public function view();
    abstract public function save();
}

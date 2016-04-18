<?php
/**
 * Created by PhpStorm.
 * User: carm1306
 * Date: 2016-03-04
 * Time: 10:51.
 */

namespace app\CommandPattern;

/*****************************************
 * Pour l'ajout d'un nouvel élément (Document par exemple)
 *
 *  1. INSERT YOUR MAGIC HERE
 *
 * ***************************************
 */
class UserCommand extends AbstractCommand
{
    public function add()
    {
        // INSERT CODE TO CREATE AN USER OR CALL METHOD TO CREATE AN USER IN MODEL
    }
    public function remove()
    {
        // INSERT CODE TO REMOVE AN USER OR CALL METHOD TO REMOVE AN USER IN MODEL
    }
    public function view()
    {
        // INSERT CODE TO VIEW AN USER OR CALL METHOD TO VIEW AN USER IN MODEL
    }
    public function save()
    {
        // INSERT CODE TO SAVE AN USER OR CALL METHOD TO SAVE AN USER IN MODEL
    }
}

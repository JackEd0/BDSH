<?php
/**
 * Created by PhpStorm.
 * User: matcaron
 * Date: 2016-04-04
 * Time: 4:06 PM.
 */

namespace app\Http\Controllers;

use App\Card;
use App\CardAssociation;
use App\Document;
use Illuminate\Routing\Controller as BaseController;

class DocumentController extends BaseController
{
    /**
     * DocumentController constructeur: redirige vers 'login' si l'on n'est pas connecté.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function importDocuments()
    {
        $importations = array();
        $mainFolder = 'C:\data\HOME\Documents\images\IMPORTER\ICONO';
        foreach (new \DirectoryIterator($mainFolder) as $collectionFolder) {
            if($collectionFolder->isDot()) continue;
            foreach (new \DirectoryIterator($mainFolder.'\\'.$collectionFolder) as $fileInfo) {
                if($fileInfo->isDot()) continue;
                array_push($importations, $this->cardDocumentAssociation($fileInfo->getFilename()));
            }
        }
        return view('documents.documentImportReport', compact('importations'));
    }


    private function cardDocumentAssociation($fileName)
    {
        $return = array(
            "fileName" => $fileName,
            "cardId" => "",
            "collection" => "",
            "comment" => "",
            "status" => 2,
        );
        if(json_encode(Document::where('file_name', $fileName)->get()) == '[]') {
            $return["collection"] = $this->getFileCollection($fileName);
            $return["cardId"] = $this->getFileCard($fileName);

            if($this->isCardExist($return["cardId"])) {
                if($this->isCardCollectionMatch($return["cardId"], $return["collection"])) {
                    Document::create([
                        'file_name' => $fileName,
                        'card_id' => $return["cardId"],
                    ]);
                    $return["comment"] = "Succès";
                    $return["status"] = 1;
                } else {
                    $return["comment"] = "Le fonds du fichier et de la fiche ne concorde pas";
                    $return["status"] = 0;
                }
            } else {
                $return["comment"] = "La fiche n'existe pas";
                $return["status"] = 0;
            }
        }
        return $return;
    }

    private function getFileCard($fileName){
        while(substr_count($fileName, '_') != 0){
            $fileName = substr($fileName, 1);
        }
        return substr($fileName, 0, strpos($fileName, "."));
    }

    private function getFileCollection($fileName){
        while(substr_count($fileName, '_') != 0){
            $fileName = substr_replace($fileName, '', -1);
        }
        return $fileName;
    }

    private function isCardExist($cardId){

        if(json_encode(Card::where('id', $cardId)->get()) == '[]') {
            return false;
        } else {
            return true;
        }
    }

    private function isCardCollectionMatch($cardId, $fileCollection){
        $currentCardInformations = CardAssociation::where('card_id', $cardId)->get();
        foreach ($currentCardInformations as $cardInformation) {
            if ($cardInformation['card_attribute_id'] == 8 && $cardInformation['value'] == $fileCollection) {
                return true;
            }
        }
        return false;
    }
}

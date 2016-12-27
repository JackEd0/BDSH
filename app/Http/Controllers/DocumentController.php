<?php
/**
 * Created by PhpStorm.
 * User: matcaron
 * Date: 2016-04-04
 * Time: 4:06 PM.
 */

namespace app\Http\Controllers;

use App\Card;
use App\Collection;
use App\Document;
use App\DocumentDownload;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class DocumentController extends BaseController
{
    // For image card type only batch import
    public function importDocuments()
    {
        $importations = array();
        $mainFolder = 'C:\data\HOME\Documents\images\IMPORTER\ICONO';
        foreach (new \DirectoryIterator($mainFolder) as $collectionFolder) {
            if ($collectionFolder->isDot()) {
                continue;
            }
            foreach (new \DirectoryIterator($mainFolder . '\\' . $collectionFolder) as $fileInfo) {
                if ($fileInfo->isDot()) {
                    continue;
                }
                array_push($importations, $this->cardDocumentAssociation($fileInfo->getFilename()));
            }
        }

        return view('documents.documentImportReport', compact('importations'));
    }

    // For image card type only batch import
    public function cardDocumentAssociation($fileName)
    {
        $return = array(
            'fileName' => $fileName,
            'cardNumber' => '',
            'collection' => '',
            'comment' => '',
            'status' => 2,
        );
        $return['collection'] = $this->getCollectionFromFileName($fileName);
        $return['cardNumber'] = $this->getCardNumberFromFileName($fileName);

        if (json_encode(Document::where('file_name', $fileName)->get()) == '[]') {
            if ($this->isCardExist($return['cardNumber'])) {
                if ($this->isCardCollectionMatch($return['cardNumber'], $return['collection'])) {
                    $card = Card::where('card_number', $return['cardNumber'])
                        ->where('card_type_id', 5)->first();
                    Document::create([
                        'file_name' => $fileName,
                        'card_id' => $card->id,
                    ]);
                    $return['comment'] = 'Succès';
                    $return['status'] = 1;
                } else {
                    $return['comment'] = 'Le fonds du fichier et de la fiche ne concorde pas';
                    $return['status'] = 0;
                }
            } else {
                $return['comment'] = "La fiche n'existe pas";
                $return['status'] = 0;
            }
        } else {
            $return['comment'] = 'Le document est déja associé';
            $return['status'] = 0;
        }

        return $return;
    }

    // Get card number from filename
    public function getCardNumberFromFileName($fileName)
    {
        while (substr_count($fileName, '_') != 0) {
            $fileName = substr($fileName, 1);
        }

        return substr($fileName, 0, strpos($fileName, '.'));
    }

    // Get card collection from filename
    public function getCollectionFromFileName($fileName)
    {
        while (substr_count($fileName, '_') != 0) {
            $fileName = substr_replace($fileName, '', -1);
        }

        return $fileName;
    }

    public function isCardExist($cardNumber)
    {
        if (json_encode(Card::where('card_number', $cardNumber)->where('card_type_id', 5)->get()) == '[]') {
            return false;
        } else {
            return true;
        }
    }

    // For image card type only
    public function isCardCollectionMatch($cardNumber, $fileCollection)
    {
        $card = Card::where('card_number', $cardNumber)
            ->where('card_type_id', 5)->firstOrFail();
        $collection = Collection::where('id', $card->collection_id)->firstOrFail();
        if ($collection['code'] == $fileCollection) {
            return true;
        }

        return false;
    }

    public function downloadImage($collection, $filename)
    {
        $documentPath = 'C:/data/HOME/Documents/images/IMPORTER/ICONO/' . $collection . '/' . $filename;
        if (file_exists($documentPath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($documentPath));
            /*$document = Document::where('file_name', $filename)->firstOrFail();
            $user =Auth::user();
            DocumentDownload::create([
                'document_id' => $document->id,
                'user_id' => $user->id,
            ]);*/
            readfile($documentPath);
            exit;
        }
    }

    public function getImage($collection, $filename)
    {
        if (isset(Auth::user()->user_type_id)) {
            $usertype = Auth::user()->user_type_id;
        } else {
            $usertype = 0;
        }

        $documentPath = 'C:/data/HOME/Documents/images/IMPORTER/ICONO/' . $collection . '/' . $filename;
        $watermarkPath = './img/histoiresherbrooke.png';
        if (file_exists($documentPath)) {
            if ($usertype != 1 && $usertype != 2 && $usertype != 3) {
                $originalWatermark = imagecreatefrompng($watermarkPath);
                $originalDocument = imagecreatefromjpeg($documentPath);

                list($imageWidth, $imageHeight) = getimagesize($documentPath);
                list($watermarkWidth, $watermarkHeight) = getimagesize($watermarkPath);
                // Resize the image for nice web presentation
                $maxHeight = 800;
                if ($imageHeight > $maxHeight) {
                    $ratio = $maxHeight / $imageHeight;
                    $document = imagecreatetruecolor($imageWidth * $ratio, $maxHeight);
                    imagecopyresized($document, $originalDocument, 0, 0, 0, 0, $imageWidth * $ratio, $maxHeight, $imageWidth, $imageHeight);
                    imagedestroy($originalDocument);
                    $imageWidth *= $ratio;
                    $imageHeight = $maxHeight;
                } else {
                    $document = imagecreatetruecolor($imageWidth, $imageHeight);
                    imagecopy($document, $originalDocument, 0, 0, 0, 0, $imageWidth, $imageHeight);
                }

                // Adjust watermark width to image width
                $ratio = $imageWidth / $watermarkWidth;
                $watermark = imagecreate($watermarkWidth * $ratio, $watermarkHeight * $ratio);
                imagecopyresized($watermark, $originalWatermark, 0, 0, 0, 0, $watermarkWidth * $ratio, $watermarkHeight * $ratio, $watermarkWidth, $watermarkHeight);
                $watermarkWidth *= $ratio;
                $watermarkHeight *= $ratio;

                // Copy the watermark image in the middle of the image
                imagecopy($document, $watermark, $imageWidth / 2 - $watermarkWidth / 2, ($imageHeight / 2 - $watermarkHeight / 2), 0, 0, imagesx($originalWatermark), imagesy($originalWatermark));

                // Output and free memory
                header('Content-type: image/jpeg');
                imagejpeg($document, null, 20);
                imagedestroy($document);
                imagedestroy($watermark);
                imagedestroy($originalDocument);
                imagedestroy($originalWatermark);
            } else {
                $document = imagecreatefromjpeg($documentPath);
                header('Content-Type:image/jpeg');
                imagejpeg($document, null, 20);
                imagedestroy($document);
            }
        }
    }

    public function recordDownload($comment, $collection, $filename)
    {
        $documentPath = 'C:/data/HOME/Documents/images/IMPORTER/ICONO/' . $collection . '/' . $filename;
        if (file_exists($documentPath)) {
            $document = Document::where('file_name', $filename)->firstOrFail();
            $user = Auth::user();
            DocumentDownload::create([
                'document_id' => $document->id,
                'comment' => $comment,
                'user_id' => $user->id,
            ]);
        }
    }
}

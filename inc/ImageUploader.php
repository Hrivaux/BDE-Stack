<?php

class ImageUploader {
    private $targetDir = "uploads/";
    private $imageFileType;
    private $uploadOk = true;
    private $errorMsg = "";
    private $uploadedFilePath;

    public function upload($file) {
        $this->imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
        $this->uploadedFilePath = $this->targetDir . basename($file["name"]);

        // Vérifier si le fichier est une image réelle
        if (!$this->isImage($file["tmp_name"])) {
            $this->uploadOk = false;
        }

        // Vérifier si le fichier existe déjà
        if (file_exists($this->uploadedFilePath)) {
            $this->errorMsg .= "Désolé, le fichier existe déjà. ";
            $this->uploadOk = false;
        }

        // Vérifier la taille du fichier
        if ($file["size"] > 500000) {
            $this->errorMsg .= "Désolé, votre fichier est trop volumineux.";
            $this->uploadOk = false;
        }

        // Autoriser certains formats de fichier
        if ($this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg" && $this->imageFileType != "gif") {
            $this->errorMsg .= "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés. ";
            $this->uploadOk = false;
        }

        // Vérifier si $uploadOk est défini sur false à cause d'une erreur
        if (!$this->uploadOk) {
            $this->errorMsg .= "Désolé, votre fichier n'a pas été téléchargé. ";
            return false;
        } else {
            if (move_uploaded_file($file["tmp_name"], $this->uploadedFilePath)) {
                return true;
            } else {
                $this->errorMsg .= "Désolé, une erreur s'est produite lors du téléchargement de votre fichier. ";
                return false;
            }
        }
    }

    private function isImage($fileTmpName) {
        $check = getimagesize($fileTmpName);
        if ($check !== false) {
            return true;
        } else {
            $this->errorMsg .= "Le fichier n'est pas une image. ";
            return false;
        }
    }

    public function getErrorMsg() {
        return $this->errorMsg;
    }

    public function getUploadedFilePath() {
        return $this->uploadedFilePath;
    }
}


?>
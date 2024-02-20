<?php

class ImageUploader {
    private $targetDir = "uploads/";
    private $imageFileType;
    private $uploadOk = true;
    private $errorMsg = "";
    private $uploadedFilePath;

    public function upload($file) {
        // Générer un nom de fichier unique pour éviter les conflits
        $this->imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $tempName = uniqid('img_', true) . '.' . $this->imageFileType;
        $this->uploadedFilePath = $this->targetDir . $tempName;

        // Vérifier si le fichier est une image réelle
        if (!$this->isImage($file["tmp_name"])) {
            $this->uploadOk = false;
        }

        // Vérifier la taille du fichier
        if ($file["size"] > 5000000) { // 500KB, ajustez selon vos besoins
            $this->errorMsg .= "Désolé, votre fichier est trop volumineux. ";
            $this->uploadOk = false;
        }

        // Autoriser certains formats de fichier
        if (!in_array($this->imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $this->errorMsg .= "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés. ";
            $this->uploadOk = false;
        }

        if ($this->uploadOk) {
            if (move_uploaded_file($file["tmp_name"], $this->uploadedFilePath)) {
                return true;
            } else {
                $this->errorMsg .= "Désolé, une erreur s'est produite lors du téléchargement de votre fichier. ";
                return false;
            }
        } else {
            $this->errorMsg .= "Désolé, votre fichier n'a pas été téléchargé. ";
            return false;
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

    public function saveImageInfo($db, $description) {
        if ($this->uploadOk) {
            $stmt = $db->prepare("INSERT INTO publications (description, chemin_image, date_publication) VALUES (:description, :chemin, NOW())");
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':chemin', $this->uploadedFilePath);
            $stmt->execute();
        } else {
            echo "Erreur lors de l'enregistrement dans la base de données : " . $this->getErrorMsg();
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

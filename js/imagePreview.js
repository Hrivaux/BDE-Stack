document
  .getElementById("fileToUpload")
  .addEventListener("change", function (event) {
    const file = event.target.files[0]; // Prend le premier fichier sélectionné par l'utilisateur

    if (file) {
      const reader = new FileReader(); // Crée un nouvel objet FileReader

      reader.onload = function (e) {
        const imagePreview = document.getElementById("imagePreview");
        imagePreview.src = e.target.result; // Définit la source de l'élément img avec les données de l'image
        imagePreview.style.display = "block"; // Affiche l'élément img
      };

      reader.readAsDataURL(file); // Lit le fichier sélectionné et déclenche l'événement onload une fois terminé
    }
  });

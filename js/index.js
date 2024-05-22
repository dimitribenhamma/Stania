/* Bouton avec un loader au chargement */
          
const theButton = document.querySelector(".button");

theButton.addEventListener("click", () => {
  theButton.classList.add("button--loading");
});

          /* Fonction abvec un délai de 3 secondes */
function login() {
  setTimeout(function () {
    window.location.href = "login.php";
  }, 3000);
}

          /* Fonction abvec un délai de 3 secondes */
function inscription() {
  setTimeout(function () {
    window.location.href = "inscription.php";
  }, 3000);
}
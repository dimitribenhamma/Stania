const parier = (matche, equipe) => {
  if (!matche) return;
  if (matche["scoreA"]) {
    alert("le matche est terminé");
    return;
  }

  const equipeName =
    equipe == "A" ? matche["nameEquipeA"] : matche["nameEquipeB"];

  const selectionDivEl = document.querySelector("#selection");
  selectionDivEl.innerHTML = "";

  const divEl = document.createElement("div");
  const pEl = document.createElement("p");
  const formEl = document.createElement("form");
  const inputEl = document.createElement("input");
  const buttonEl = document.createElement("button");

  pEl.innerHTML = `Votre Pari<br>${equipeName} <i>Vainqueur</i>`;

  inputEl.setAttribute("type", "number");
  inputEl.setAttribute("name", "mise");
  inputEl.setAttribute("min", "0");
  inputEl.setAttribute("placeholder", "Votre mise");

  buttonEl.setAttribute("type", "submit");
  buttonEl.innerHTML = "Miser";

  formEl.setAttribute("action", "mise-handler.php");
  formEl.setAttribute("method", "POST");
  formEl.appendChild(inputEl);
  formEl.appendChild(buttonEl);

  divEl.appendChild(pEl);
  divEl.appendChild(formEl);

  selectionDivEl.appendChild(divEl);
};
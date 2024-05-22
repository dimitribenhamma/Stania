const displayEffectif = (element, childIndex) => {
  const parentNode = element.parentNode;

  const listEl = parentNode.children[childIndex];

  const isElementVisible = listEl.style.visibility === "visible";

  if (isElementVisible) {
    listEl.style.visibility = "hidden";
    listEl.style.height = "0";
  } else {
    listEl.style.visibility = "visible";
    listEl.style.height = "auto";
  }
};

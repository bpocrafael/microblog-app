const textarea = document.getElementById("content");
const maxLength = parseInt(textarea.getAttribute("maxlength"));
const charCountMessage = document.getElementById("char-count-message");

textarea.addEventListener("input", function () {
  const currentLength = textarea.value.length;

  if (currentLength === maxLength) {
    charCountMessage.style.display = "block";
  } else {
    charCountMessage.style.display = "none";
  }
});
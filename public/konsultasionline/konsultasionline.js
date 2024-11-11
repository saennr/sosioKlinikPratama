const buttonSubmit = document.getElementById("btn-submit");
const popup = document.getElementById("popup");
const closePopup = document.getElementById("close-popup");

function showPopup() {
    popup.style.display = "flex";
    popup.style.opacity = 0;
    setTimeout(() => {
      popup.style.opacity = 1;
    }, 10);
  
    setTimeout(() => {
      popup.style.opacity = 0;
      setTimeout(() => {
        popup.style.display = "none";
      }, 500); 
    }, 3000);
}

buttonSubmit.addEventListener("click", showPopup);

// Close pop-up when clicking on the close button
closePopup.addEventListener("click", () => {
    popup.style.display = "none";
  });
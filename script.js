const hamburger = document.querySelector(".hamburger");
const navContainer = document.querySelector(".nav-container");

hamburger.addEventListener("click", () =>{
  hamburger.classList.toggle("active");
  navContainer.classList.toggle("active");
  navContainer.Style.backgroundColor = "blue";
})

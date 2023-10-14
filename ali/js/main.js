let image = document.querySelector(".landing .container .hero");
let container = document.querySelector(".text");
let landing = document.querySelector(".landing") 





  function updateContainerHeight() {
    
  

    if (window.innerWidth > 768) {
      // Set the container's height to match the image's height
      container.style.height = image.height + "px";
      landing.style.height = image.height + "px";
      landing.style.overflow = "hidden";
    } else {
      // If the screen size is 768px or larger, reset the container's height to auto
      container.style.height = "auto";
      // landing.style.height = "";
      landing.style.height ="calc(161.1vh - 162px)"
      // landing.style.overflow = "inherit";
    }
    // container.style.height = image.height + "px";
  
  
    }
  
  
      updateContainerHeight();
  
      window.addEventListener("resize", updateContainerHeight);

      let icons = document.querySelector(".line");
      let lineTwo = document.getElementsByClassName("line-two");
      let lineOne = document.getElementsByClassName("line-one");
      let lineThree = document.getElementsByClassName("line-three");
      let nav = document.querySelector(".nav ul"); // Get the .nav element
      
      let isRotated = false; // Track the rotation state
      let isNavVisible = false; // Track the nav display state
      
      icons.addEventListener("click", function () {
        for (let i = 0; i < lineTwo.length; i++) {
          if (isRotated) {
            // If it's already rotated, return to the normal condition
            lineOne[i].style.transformOrigin = "";
            lineOne[i].style.transform = "";
            lineThree[i].style.transformOrigin = "";
            lineThree[i].style.transform = "";
            lineTwo[i].style.width = "";
          } else {
            // If it's not rotated, rotate the lines
            lineTwo[i].style.width = "0";
            lineOne[i].style.transformOrigin = "bottom right";
            lineOne[i].style.transform = "rotate(-45deg)";
            lineThree[i].style.transformOrigin = "top right";
            lineThree[i].style.transform = "rotate(45deg)";
          }
        }
        isRotated = !isRotated; // Toggle the rotation state
        
        // Toggle the nav display
        if (isNavVisible) {
          nav.style.marginTop = "20px";
          nav.style.opacity = "0";
       
        } else {
          nav.style.marginTop = "10px";
          nav.style.opacity = "1";
        }
        isNavVisible = !isNavVisible; // Toggle the nav display state
      });
      
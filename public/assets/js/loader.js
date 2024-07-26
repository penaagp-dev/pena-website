let id = document.getElementById("loaderPage")

window.onload = () =>{
    setTimeout(function(){
        id.style.opacity = "0"
        id.style.background = "black"
    }, 3000);
    setTimeout(function(){
        id.style.display = "none"
    }, 200)

}

    
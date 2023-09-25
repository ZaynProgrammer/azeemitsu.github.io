// toggle class active
const navbarNav = document.querySelector('.navbar-nav'); 

// while clicking hamburger menu
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};

// click outside sidebar
const hamburger = document.querySelector('#hamburger-menu')
document.addEventListener('click', function(e){
    if(!hamburger.contains(e.target) && !navbarNav.contains(e.target)){
        navbarNav.classList.remove('active')   
    }
})

let play = document.getElementById('music')

let music = new Audio()
music.src = "music/FortniteJustice Lobby Music (Billy Bounce).mp3"
music.loop = true
music.play()

function playMusic(){
    play.addEventListener('click', fplay)
    function fplay(){
        if(music.paused){
            music.play()
        } else {
            music.pause()
        }
    }
}

window.addEventListener('load', playMusic)
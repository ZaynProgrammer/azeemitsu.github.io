// toggle class active
const navbarExe = document.querySelector('.btn'); 

// while clicking hamburger menu
document.querySelector('#hamburger-menu').onclick = () => {
    navbarExe.classList.toggle('active');
};

// click outside sidebar
const hamBurger = document.querySelector('#hamburger-menu')
document.addEventListener('click', function(e){
    if(!hamBurger.contains(e.target) && !navbarExe.contains(e.target)){
        navbarExe.classList.remove('active')   
    }
})

let play = document.getElementById('music')

let music = new Audio()
music.src = "music/Fortnite Billy Listen Lobby Music (Billy Bounce Emote).mp3"
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
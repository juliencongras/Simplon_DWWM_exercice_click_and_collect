document.getElementsByClassName("mp3button")

function playmp3(e){
    mp3string = String(e)
    mp3 = new Audio(mp3string);
    mp3.play();
}
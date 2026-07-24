<!DOCTYPE html> 
<html> 
<body> 

<div style="text-align:center"> 
  <button onclick="playPause()">Play/Pause</button> 
  <button onclick="nextButton()">Next</button>
  <br> 
  <video id="video1" width="420">
    <source src="video/DEABETICS AND FOOD.mp4" type="video/mp4">
    <source  type="video/mp3">
     <source type="video/ogg">
    Your browser does not support HTML5 video.
  </video>
</div> 

<script> 
var myVideo=document.getElementById("video1"); 
var videoList=['Exam480Mod2Part1_mid_css3_1.mp4','Exam480Mod1Part2_mid_html.mp4','DEABETICS AND FOOD.mp4','[DDR] Udaan - 06 - Aazaadiyan.mp3','mov_bbb.ogg'];
var index = videoList.indexOf(window.currentVideoName);

//Next button
function nextButton(){
myVideo.pause();
myVideo.currentTime=0;
index = index + 1;
if(index==videoList.length)
index = 0;
alert(videoList[index]);
myVideo.src = 'C:/'+videoList[index];
window.currentVideoName=videoList[index];
myVideo.play();
}

function playPause()
{ 
if (myVideo.paused) 
  myVideo.play(); 
else 
  myVideo.pause(); 
} 

</script> 

</body> 
</html>

<?php

  $txt='HI STEVEN Good Morning';
  $txt1=htmlspecialchars($txt);
  $txt2=rawurlencode($txt1);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt2.'&tl=en-IN');
  $speech="<audio controls='controls' autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  $speech1="<audio controls='controls' autoplay><source src='data:audio/ogg;base64,".base64_encode($html)."'></audio>";
  echo $speech;
  echo $speech1;

?>

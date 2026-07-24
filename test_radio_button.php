<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
    <link rel="stylesheet" href="jsnew/normalize.min.css">

  
      <style>

// The code is a bit of a mess at the moment! Sorry about that.

body {
  padding: 1rem;
  color: hsla(215, 5%, 50%, 1);
}
h1 {
  color: hsla(215, 5%, 10%, 1);
  margin-bottom: 2rem;
}
section {
  display: flex;
  flex-flow: row wrap;
}
section > div {
  flex: 1;
  padding: 0.5rem;
}
input[type="radio"] {
  display: none;
  &:not(:disabled) ~ label {
    cursor: pointer;
  }
  &:disabled ~ label {
    color: hsla(150, 5%, 75%, 1);
    border-color: hsla(150, 5%, 75%, 1);
    box-shadow: none;
    cursor: not-allowed;
  }
}
label {
  height: 100%;
  display: block;
  background: white;
  border: 2px solid hsla(150, 75%, 50%, 1);
  border-radius: 20px;
  padding: 1rem;
  margin-bottom: 1rem;
  //margin: 1rem;
  text-align: center;
  box-shadow: 0px 3px 10px -2px hsla(150, 5%, 65%, 0.5);
  position: relative;
}
input[type="radio"]:checked + label {
  background: hsla(150, 75%, 50%, 1);
  color: hsla(215, 0%, 100%, 1);
  box-shadow: 0px 0px 20px hsla(150, 100%, 50%, 0.75);
  &::after {
    color: hsla(215, 5%, 25%, 1);
    font-family: FontAwesome;
    border: 2px solid hsla(150, 75%, 45%, 1);
    content: "\f00c";
    font-size: 24px;
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    height: 50px;
    width: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    background: white;
    box-shadow: 0px 2px 5px -2px hsla(0, 0%, 0%, 0.25);
  }
}
input[type="radio"]#control_05:checked + label {
  background: red;
  border-color: red;
}



p {
  font-weight: 900;
}


@media only screen and (max-width: 700px) {
  section {
    flex-direction: column;
  }
}
View Compiled




</style>
<p>Haven't finish this yet but, boy, what fun it's been!</p>
<h1>New Game</h1>
<h2>Select difficulty&hellip;</h2>
<section>
<div>
  <input type="radio" id="control_01" name="select" value="1" checked>
  <label for="control_01">
    <h2>Pfft</h2>
    <p>Awww, poor baby. Too afraid of the scary game sprites? I laugh at you.</p>
  </label>
</div>
<div>
  <input type="radio" id="control_02" name="select" value="2">
  <label for="control_02">
    <h2>Wannabe</h2>
    <p>You're not a gaming God by any stretch of the imagination.</p>
  </label>
</div>
<div>
  <input type="radio" id="control_03" name="select" value="3">
  <label for="control_03">
    <h2>Daaamn</h2>
    <p>Now we're talking. It's gettin' a bit hairy out there in game land.</p>
  </label>
</div>
<div>
  <input type="radio" id="control_04" name="select" value="4" disabled>
  <label for="control_04">
    <h2>Mental</h2>
    <p>Prepare for glory! This is going to be one hell of a no-holds-barred ride.</p>
  </label>
</div>
<div>
  <input type="radio" id="control_05" name="select" value="5">
  <label for="control_05">
    <h2>Suicidal</h2>
    <p>You will not live. Strap in and write a heart-felt letter to your loved ones.</p>
  </label>
</div>
</section>

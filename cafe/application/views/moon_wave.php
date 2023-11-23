<style>
  .test {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #1c1d22;
  color: rgba(255,255,255,0.6);
}

.wrap {
  width: 500px;
  height: 500px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.circle {
  width: 400px;
  height: 400px;
  position: relative;
  overflow: hidden;
  border: 7px solid #464343;
  border-radius: 100%;
  background: linear-gradient(#3c5aff, #52f2fd);
  transform: translate3d(0, 0, 0);
}

.wave-one {
  width: 600px;
  height: 600px;
  position: absolute;
  top: -65%;
  left: -30%;
  border-radius: 45%;
  background: rgba(3,169,244,0.8);
  animation: move 3s infinite linear;
}

.wave-two {
  width: 650px;
  height: 650px;
  position: absolute;
  top: -90%;
  left: -30%;
  border-radius: 45%;
  background: rgba(34,79,242,0.8);
  animation: move 5s infinite linear;
}

.wave-three {
  width: 650px;
  height: 650px;
  position: absolute;
  top: -100%;
  left: -30%;
  border-radius: 45%;
  background: #1d074b;
  border: 6px solid rgba(131,119,152,0.7);
  animation: move 7s infinite linear;
}

.wave-four {
  width: 650px;
  height: 650px;
  position: absolute;
  top: -100%;
  left: -30%;
  border-radius: 46%;
  background: linear-gradient(rgba(252,251,232,0.1) 10%,                  transparent);
  animation: move 7s infinite linear;
}

@keyframes move {
  100% {
    transform: rotate(360deg);
  }
}

/* moon css & animation */
.fa-moon {
  position: absolute;
  top: 19%;
  left: 33%;
  font-size: 130px;
  color: rgba(255,255,255,0.8);
  animation: moon-rotation 4s infinite linear;
}

.blur {
  filter: blur(10px);
  -webkit-filter: blur(10px);
}

@keyframes moon-rotation {
  0%, 100% {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(-20deg);
  }
}

/* star css & animation */
.fa-asterisk {
  position: absolute;
  font-size: 13px;
}

.star1 {
  top: 70px;
  left: 90px;
  animation: star-one 1.2s infinite;
}
      
.star2 {
  top: 50px;
  right: 110px;
  animation: star-two 1.7s infinite;
}
      
.star3 {
  top: 180px;
  left: 45px;
  animation: star-three 1.5s infinite;
}
      
.star4 {
  top: 120px;
  right: 40px;
  font-size: 5px;
  animation: star-five 1.9s infinite;
}

.star5 {
  top: 200px;
  right: 90px;
  font-size: 5px;
  animation: star-five 2s infinite;
}


@keyframes star-one {
  0%, 100% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
}
    
@keyframes star-two {
  0%, 100% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
}
    
@keyframes star-three {
  0%, 100% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
}
    
@keyframes star-four {
  0%, 100% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes star-five {
  0%, 100% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1);
    opacity: 1;
  }
}
</style>

<body class="test relative">
  
  <div class="wrap">
    <div class="circle">
      <!-- wave -->
      <div class="wave-one"></div>
      <div class="wave-two"></div>
      <div class="wave-three"></div>
      <div class="wave-four"></div>
      
      <!-- moon -->
      <i class="fas fa-moon"></i>
      <i class="fas fa-moon blur"></i>
      
      <!-- star -->
      <div class="star">
        <i class="fas fa-asterisk star1"></i>
        <i class="fas fa-asterisk star2"></i>
        <i class="fas fa-asterisk star3"></i>
        <i class="fas fa-asterisk star4"></i>
        <i class="fas fa-asterisk star5"></i>
      </div>
    </div>
  </div>

</body>
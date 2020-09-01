const metronome = document.getElementById("metronome");
const metronomeNumber = document.getElementById("metronome-number");
let startBtn = document.getElementById("start");
let stopBtn = document.getElementById("stop");
let beatCounter = 1;
const signatureBeat = /\d+/;
const signatureBar = /\d+$/;
const sound = document.getElementById("sound");
const volume = document.getElementById("volume");
let colorTypeMetronome = true;
let numberTypeMetronome = false;
let bpm = document.getElementById("bpm");
let metronomeStyle = document.getElementById("metronome-style");
let bpmValue;
const increaseBpm = document.getElementById("increase-bpm");
const decreaseBpm = document.getElementById("decrease-bpm");
let userSignature = document.getElementById("signature");
let userSignatureBeat;
let userSignatureBar;
let singleBeat;
let interval;
let increaseDecreaseActive = false;
let increaseDecreaseBpm;

const getBpm = () => {
  bpmValue = Number(bpm.value);
};

const bpmLimit = () => {
  bpmValue = bpmValue >= 240 ? 240 : bpmValue <= 40 ? 40 : bpmValue;
  bpm.value = bpmValue;
};

bpm.addEventListener("change", () => {
  getBpm();
  bpmLimit();
  if (startBtn.disabled) {
    stopMetronome();
    startMetronome();
  }
});

userSignature.addEventListener("change", () => {
  getUserSignature();
  if (startBtn.disabled) {
    stopMetronome();
    startMetronome();
  }
});

metronomeStyle.addEventListener("change", () => {
  getMetronomeStyle();
  if (startBtn.disabled) {
    stopMetronome();
    startMetronome();
  }
});

increaseBpm.addEventListener("mousedown", () => {
  increaseDecreaseActive = true;
  increaseDecreaseBpm = setInterval(function () {
    getBpm();
    bpmValue++;
    bpmLimit();
  }, 100);
});

increaseBpm.addEventListener("touchstart", () => {
  increaseDecreaseActive = true;
  increaseDecreaseBpm = setInterval(function () {
    getBpm();
    bpmValue++;
    bpmLimit();
  }, 100);
});

decreaseBpm.addEventListener("mousedown", () => {
  increaseDecreaseActive = true;
  increaseDecreaseBpm = setInterval(function () {
    getBpm();
    bpmValue--;
    bpmLimit();
  }, 100);
});

decreaseBpm.addEventListener("touchstart", () => {
  increaseDecreaseActive = true;
  increaseDecreaseBpm = setInterval(function () {
    getBpm();
    bpmValue--;
    bpmLimit();
  }, 100);
});

window.addEventListener("mouseup", () => {
  if (increaseDecreaseActive) {
    clearInterval(increaseDecreaseBpm);
    if (startBtn.disabled) {
      stopMetronome();
      startMetronome();
    }
  }
  increaseDecreaseActive = false;
});

window.addEventListener("touchend", () => {
  if (increaseDecreaseActive) {
    clearInterval(increaseDecreaseBpm);
    if (startBtn.disabled) {
      stopMetronome();
      startMetronome();
    }
  }
  increaseDecreaseActive = false;
});

const getMetronomeStyle = () => {
  metronomeStyleValue = metronomeStyle.value;
  if (metronomeStyleValue === "color") {
    colorTypeMetronome = true;
    numberTypeMetronome = false;
  } else {
    colorTypeMetronome = false;
    numberTypeMetronome = true;
  }
};

const getUserSignature = () => {
  userSignatureValue = userSignature.value;
  userSignatureBeat = Number(userSignatureValue.match(signatureBeat));
  userSignatureBar = Number(userSignatureValue.match(signatureBar));
};

const getSingleBeat = () => {
  singleBeat = 60000 / bpmValue;
  if (userSignatureBar === 2) {
    singleBeat = singleBeat * 2;
  } else if (userSignatureBar === 8) {
    singleBeat = singleBeat / 2;
  } else {
    singleBeat;
  }
};

const setMetronome = () => {
  if (colorTypeMetronome) {
    metronome.style.backgroundColor = beatCounter === 1 ? "green" : "red";
  } else if (numberTypeMetronome) {
    metronomeNumber.textContent = beatCounter;
  }

  sound.src =
    beatCounter === 1 ? "media/sounds/BeatUp.mp3" : "media/sounds/BeatDown.mp3";
  sound.currentTime = 0;
  sound.play();

  setTimeout(function () {
    metronome.style.backgroundColor = "#f8f9fa";
  }, 100);

  beatCounter++;
  beatCounter = beatCounter > userSignatureBeat ? 1 : beatCounter;
};

const startMetronome = () => {
  startBtn.disabled = true;
  stopBtn.disabled = false;
  getMetronomeStyle();
  getUserSignature();
  getBpm();
  getSingleBeat();
  setMetronome();

  const beatChange = () => {
    setMetronome();
  };

  interval = setInterval(beatChange, singleBeat);
};

startBtn.addEventListener("click", () => {
  startMetronome();

  stopBtn.addEventListener("click", stopMetronome);
});

const stopMetronome = () => {
  stopBtn.disabled = true;
  startBtn.disabled = false;
  clearInterval(interval);
  beatCounter = 1;
  metronomeNumber.textContent = "";
  sound.pause();
};

volume.addEventListener("click", function () {
  if (sound.muted) {
    volume.classList.remove("fa-volume-mute");
    volume.classList.add("fa-volume-up");
    sound.muted = false;
  } else {
    volume.classList.remove("fa-volume-up");
    volume.classList.add("fa-volume-mute");
    sound.muted = true;
  }
});

const visualMode = document.getElementById("visual-mode");
const textMode = document.querySelectorAll(".text-mode");
let darkMode = false;
const bg = document.getElementsByTagName("body")[0];
visualMode.addEventListener("click", () => {
  if (!darkMode) {
    bg.classList.add("bg-dark");
    for (let i = 0; i < textMode.length; i++) {
      textMode[i].classList.add("text-white");
    }
    visualMode.textContent = "Light Mode";
    darkMode = true;
  } else {
    bg.removeAttribute("class");
    for (let i = 0; i < textMode.length; i++) {
      textMode[i].classList.remove("text-white");
    }
    visualMode.textContent = "Dark Mode";
    darkMode = false;
  }
});

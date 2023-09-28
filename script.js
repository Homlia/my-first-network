


// Смена аватарки
// ===================================================
const body = document.querySelector('body');
const buttonChangeAva = document.querySelector("#input-ava");
const photoAva = document.querySelector(".content-brief-ava");

const errorFile = document.querySelector(".errorFile");




function donwloadAva(input) {
    let fileAva = input.files[0];
    let readAva = new FileReader();
    readAva.readAsDataURL(fileAva);


    let arr = [];
    let type;

    arr = fileAva.type.split("");
    type = arr.slice(0, 5).join("");

    if (type == 'image') {

        readAva.onload = function () {
        photoAva.innerHTML = "";
        let img = document.createElement("img");
        photoAva.appendChild(img);
        img.src = readAva.result;
    };
    } else {
        let text = "Файл не являеться фотографией";
        wrongFile(text);
    }
}


// wrongFile function

function wrongFile(text) {
    errorFile.innerText = text;
    errorFile.classList.add("displayBlock");
    setTimeout(function () {
      errorFile.classList.remove("displayBlock");
    }, 3000);
}






// Смена текста в поле "Общая информация"
// ===================================================

const briefInfo = document.querySelector(".content-brief-info-list");





briefInfo.addEventListener('click', function (event) {
    if (event.target.attributes[0].nodeValue == "brief-info") {
      // input.value = event.target.innerText;
        
        let valueNum = event.target.attributes[1].nodeValue;

      // Ищем все элементы с атрибутом
    let inputBriefInfo = document.querySelectorAll(`[data-inpun-brief-info="${valueNum}"]`
    );

      // Выводим найденные элементы
      inputBriefInfo.forEach((element) => {
          element.value = event.target.innerText;
          element.classList.add('displayBlock');
          element.focus();
          event.target.classList.add("displayNone");
      });
    }
})


const focusElement1 = document.querySelector(`[data-inpun-brief-info="1"]`);
const focusElement2 = document.querySelector(`[data-inpun-brief-info="2"]`);
const focusElement3 = document.querySelector(`[data-inpun-brief-info="3"]`);
const focusElement4 = document.querySelector(`[data-inpun-brief-info="4"]`);




focusElement1.addEventListener("focusout", function (event) {focusout(event);});
focusElement2.addEventListener("focusout", function (event) { focusout(event); });
focusElement3.addEventListener("focusout", function (event) { focusout(event); });
focusElement4.addEventListener("focusout", function (event) {focusout(event);});


function focusout(event) {
    let inputNum = event.target.attributes[2].nodeValue;
    let elementText = document.querySelector(`[data-brief-info="${inputNum}"]`);
    let elementInput = document.querySelector(`[data-inpun-brief-info="${inputNum}"]`);

    if (elementInput.value == '') {
        elementInput.value = 'Нет информации';
    }
    elementText.innerText = elementInput.value;

    elementText.classList.remove('displayNone');
    elementInput.classList.remove("displayBlock");
}





// Добавление фото/видео в галерею
// ===================================================

const gallery = document.querySelector(".content-gallery-block");

let galleryNum = 0;

let score = document.querySelector(".scoreFile");

function donwload(input) {
    let file = input.files[0];
    let read = new FileReader();
    read.readAsDataURL(file);

    let arr = [];
    let type;
    galleryNum++;

    arr = file.type.split('');
    type = arr.slice(0, 5).join('');

    if (type == 'image') {
        read.onload = function () {
        let img = document.createElement("img");
        gallery.appendChild(img);
        img.src = read.result;
        img.setAttribute('data-gallery-num', `${galleryNum}`);
    }
    }
    if (type == 'video') {
        read.onload = function () {
        let video = document.createElement("video");
        // video.setAttribute("preload", "metadata");
        // video.setAttribute("controls", "");
        gallery.appendChild(video);
        video.src = read.result;
        video.setAttribute("data-gallery-num", `${galleryNum}`);
    }
    }
    if (type != "image" && type != 'video') {
    let text = "Файл не являеться фотографией/видео";
    wrongFile(text);
    }
}


const showGallery = document.querySelector('.showGallery');

// Показ фото/видео в галереи

gallery.addEventListener('click', function (event) {

    // console.log(event);
    // console.log(event.target);
    // console.log(event.target.localName);


    let localName = event.target.localName;
    if (localName == 'img' || localName == 'video') {

        showGallery.classList.add('displayBlock');
        body.classList.add("overflow");
        let clonedElement = event.target.cloneNode(true);
        clonedElement.setAttribute("controls", "");

        showGallery.appendChild(clonedElement);

        score.innerText = `${event.target.attributes[1].nodeValue}/${galleryNum}`;
    } 
    
})


// Закрытие галереи

showGallery.addEventListener('click', function (event) {
    if (event.target.classList[0] == "showGallery") {
        let file = showGallery.querySelector("[data-gallery-num]");
        file.remove();
        showGallery.classList.remove("displayBlock");
        body.classList.remove("overflow");
    }
})



const next = document.querySelector('.next');
const previous = document.querySelector(".previous");

let nowGalleryNomber;

next.addEventListener('click', function () {
    if (galleryNum == 1) {
        return
    }

    nowGalleryNomber = showGallery.querySelector("[data-gallery-num]");
    nowGalleryNomber = nowGalleryNomber.attributes[1].nodeValue;

    nowGalleryNomber++;
    
    if (nowGalleryNomber > galleryNum) {
        nowGalleryNomber = 1;
    }

    let nowFile = showGallery.querySelector("[data-gallery-num]");
    nowFile.remove();

    let nextFile = document.querySelector(`[data-gallery-num="${nowGalleryNomber}"]`);
    console.log(nextFile);
    let clonedElement = nextFile.cloneNode(true);
    clonedElement.setAttribute("controls", "");
    showGallery.appendChild(clonedElement);

    score.innerText = `${nowGalleryNomber}/${galleryNum}`;
})


previous.addEventListener("click", function () {

    if (galleryNum == 1) {
        return
    }
    nowGalleryNomber = showGallery.querySelector("[data-gallery-num]");
    nowGalleryNomber = nowGalleryNomber.attributes[1].nodeValue;

    nowGalleryNomber--;

    if (nowGalleryNomber < 1) {
    nowGalleryNomber = galleryNum;
    }

    let nowFile = showGallery.querySelector("[data-gallery-num]");
    nowFile.remove();

    let previousFile = document.querySelector(
    `[data-gallery-num="${nowGalleryNomber}"]`
    );
    let clonedElement = previousFile.cloneNode(true);
    clonedElement.setAttribute('controls', '');
    showGallery.appendChild(clonedElement);

    score.innerText = `${nowGalleryNomber}/${galleryNum}`;
});




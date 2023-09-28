

const settingNav = document.querySelector(".setting-nav");
const settingProfile = document.querySelector("#setting-profile");
const settingTopic = document.querySelector("#setting-topic");



let elem = settingProfile;

settingNav.addEventListener('click', function (event) {
  if (event.target.attributes[0].nodeValue == 1) {
        elem.classList.add("display__none");
        elem.classList.remove("display__table");
        elem = settingProfile;
        elem.classList.add("display__table");
        elem.classList.remove("display__none");
    }
  if (event.target.attributes[0].nodeValue == 2) {
      elem.classList.add("display__none");
      elem.classList.remove("display__table");
      elem = settingTopic;
      elem.classList.add("display__table");
      elem.classList.remove("display__none");
    }
})



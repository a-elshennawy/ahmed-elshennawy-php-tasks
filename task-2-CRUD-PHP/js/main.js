// refresh page after closing indication msg to remove cache
let closeRefresher = document.querySelector(".btn-close");
closeRefresher.addEventListener("click", function () {
  location.replace("http://localhost/instant-php/task-2-CRUD-PHP");
});

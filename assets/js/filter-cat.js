$(document).ready(function() {
  const filter_button = document.querySelectorAll(".filter-button");
  const marques = document.querySelector("#marques");
  filter_button.forEach(element => {
    element.addEventListener("click", () => {
      marques.innerHTML = "";
      $.ajax({
        url:
          "http://localhost/Animopolis/wp-json/wp/v2/marque?categories=" +
          element.dataset.cat_id +
          "&tags=" +
          element.dataset.tag,
        dataType: "json",
        success: function(json) {
          json.forEach(element => {
            if (element.featured_media !== 0) {
              $.ajax({
                url:
                  "http://localhost/Animopolis/wp-json/wp/v2/media/" +
                  element.featured_media,
                dataType: "json",
                success: function(json2) {
                  marques.innerHTML +=
                    "<li><img src='" +
                    json2.guid.rendered +
                    "'>" +
                    element.title.rendered +
                    "</li>";
                }
              });
            } else {
              // rajouter img par default
              marques.innerHTML +=
                "<li><img src='jjjjj'>" + element.title.rendered + "</li>";
            }
          });
        }
      });
      return false;
    });
  });
});

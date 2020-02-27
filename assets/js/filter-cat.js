$(document).ready(function() {
  const filter_button = document.querySelectorAll(".filter-button");
  const marques = document.querySelector("#marques");
  filter_button.forEach(element => {
    element.addEventListener("click", () => {
      marques.innerHTML = "";
      $.ajax({
        url:
          "http://localhost:8888/Animopolis/wp-json/wp/v2/marque?categories=" +
          element.dataset.cat_id +
          "&tags=" +
          element.dataset.tag,
        dataType: "json",
        success: function(json) {
          json.forEach(element => {
            if (element.featured_media !== 0) {
              console.log(element);
              $.ajax({
                url:
                  "http://localhost:8888/Animopolis/wp-json/wp/v2/media/" +
                  element.featured_media,
                dataType: "json",
                success: function(json2) {
                  //const variable = test ? vrai : faux;
                  const slogan = element.acf["slogan-brand"] === null ? '' : element.acf["slogan-brand"];
                  const intro = element.acf["intro-brand"] === null ? '' : element.acf["intro-brand"];
                  marques.innerHTML +=
                    "<li class='brand-card flx-ac mall-15'>" +
                    "<div class='affiche-brand-image flx-ac'>"+
                    "<div class='encard-logo-brand'><img src='" +
                    json2.guid.rendered +
                    "'>" +
                    "</div>"+
                    "</div>"+
                    "<div class='content-brand pall-15 txt-cl-princ'>"+
                    "<h2 class='txt-scde'>"+
                    element.title.rendered +
                    "</h2>"+"<p class='ita'>"+slogan+"</p><p>"+intro+"</p></div>"+
                    "</li>";
                }
              });
            } else {
              // rajouter img par default
              const slogan = element.acf["slogan-brand"] === null ? '' : element.acf["slogan-brand"];
              const intro = element.acf["intro-brand"] === null ? '' : element.acf["intro-brand"];

              marques.innerHTML +=
                "<li class='brand-card flx-ac mall-15'>" +
                "<div class='affiche-brand-image flx-ac'>"+
                "<div class='encard-logo-brand'><img src='JJJ'>"+
                "</div>"+
                "</div>"+
                "<div class='content-brand pall-15 txt-cl-princ'>"+
                "<h2 class='txt-scde'>"+
                element.title.rendered +
                "</h2>"+"<p class='ita'>"+slogan+"</p><p>"+intro+"</p></div>"+
                "</li>";
            }
          });
        }
      });
      return false;
    });
  });
});

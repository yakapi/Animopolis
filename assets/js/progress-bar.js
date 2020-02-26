    var i = 0;
    function move() {
      if (i == 0) {
        i = 1;
        var nb = document.getElementById('nb-progress');
        var elem = document.getElementById("myBar");
        var width = 1;
        var id = setInterval(frame, 10);
        function frame() {
          if (width >= 95) {
            clearInterval(id);
            i = 0;
          } else {
            width++;
            elem.style.width = width + "%";
            nb.innerHTML = width + "%";
          }
        }
      }
    }
    move()

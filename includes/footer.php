<!-- JQUERY FIRST -->
<script src="src/js/jquery-2.1.4.js"></script>
<!-- Typed Js -->
<script type="text/javascript" src="src/js/typed.js"></script>
<!-- Progress bar -->
<script src='src/js/nprogress.js'></script>
<!-- wow js-->
<script src="src/js/wow.min.js"></script>
<!-- Materialize Js -->
<script src="src/js/materialize.min.js"></script>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>

<script>
  particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#fff"
      },
      "shape": {
        "type": "star",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.6,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 200,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": false
  });
</script>
<script>
  <!-- //SMOOTH SCROLL -->
  $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length && target.selector.indexOf("#top") > -1) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 55)
        }, 1000);
        e.preventDefault();
      } else if (target.length && target.selector.indexOf("#top") < 1 && target.selector != '') {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        e.preventDefault();
      }
    }
  });
  <!-- //SMOOTH SCROLL -->

  $(document).ready(function() {
    $('select').material_select();
  });

  $(document).ready(function() {
    $('.tooltipped').tooltip({
      delay: 50
    });
  });

  new WOW().init();


  $(function() {
    $(".searching").typed({
      strings: ["Gopro hero 5",
        "Apple watch",
        "DJI Mavic Pro",
        "MSI GP 62",
        "Macbook pro retina 2015",
        "Google Pixel XL",
      ],
      typeSpeed: -8
    });
  });


  $('.searching').on('click', function(e) {
    $(this).data('typed').reset();
    $('#search').replaceWith('<input id="search" type="search" name="searched" required>');
    $("#search").focus();

  });

  $(".value2").change(function() {

    if ($(".value1").val() === $(".value2").val()) {
      $(".value2").css('color', '#4caf50');
      $("#confirmed").prop("disabled", false);
    } else {
      $(".value2").css('color', '#b71c1c');
      $("#confirmed").prop("disabled", true);
    }
  });

  $("#search").focus(function() {
    $(".miaw").removeClass("hide");
  });

  $(document).ready(function() {
    $('ul.tabs').tabs();
  });

  $(document).ready(function() {
    $('.materialboxed').materialbox();
  });



  $(".baskett").hover(function() {
    $(".baskett").addClass("animated pulse");
  }, function() {
    $(".baskett").removeClass("animated pulse");
  });

  $(window).load(function() { // makes sure the whole site is loaded
    NProgress.start();
    NProgress.inc(0.3);
    NProgress.done();

    $('body').delay(350).css({
      'overflow': 'visible'
    });
  })
</script>

</body>

</html>
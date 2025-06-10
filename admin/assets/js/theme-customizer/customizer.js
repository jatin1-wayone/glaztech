(function ($) {
  if (localStorage.getItem("color"))
    $("#color").attr(
      "href",
      "../assets/css/" + localStorage.getItem("color") + ".css"
    );
  $(
   
  ).appendTo($("body"));
  (function () {})();
  // COLOR_PICKER
  $(document).ready(function () {
    $(".customizer-color li").on("click", function () {
      $(".customizer-color li").removeClass("active");
      $(this).addClass("active");
      var color = $(this).attr("data-attr");
      var primary = $(this).attr("data-primary");
      var secondary = $(this).attr("data-secondary");
      localStorage.setItem("color", color);
      localStorage.setItem("primary", primary);
      localStorage.setItem("secondary", secondary);
      localStorage.removeItem("dark");
      $("#color").attr("href", "../assets/css/" + color + ".css");
      $(".dark-only").removeClass("dark-only");
      location.reload(true);
    });
  });

  if (localStorage.getItem("primary") != null) {
    document.documentElement.style.setProperty(
      "--theme-default",
      localStorage.getItem("primary")
    );
  }
  if (localStorage.getItem("secondary") != null) {
    document.documentElement.style.setProperty(
      "--theme-secondary",
      localStorage.getItem("secondary")
    );
  }
  // SETTING-SIDEBAR-TOGGLE
  $(document).ready(function () {
    document.getElementById("cog-click").addEventListener("click", function () {
      var settingSidebar = document.querySelector(".setting-sidebar");
      settingSidebar.classList.add("open");
    });

    document.getElementById("cog-close").addEventListener("click", function () {
      var settingSidebar = document.querySelector(".setting-sidebar");
      settingSidebar.classList.remove("open");
    });
    // LTR/RTL/BOX_LAYOUT
    document
      .querySelector(".ltr-setting")
      .addEventListener("click", function () {
        document.body.classList.remove("rtl", "ltr", "box-layout");
        document.body.classList.add("ltr");
        document.documentElement.setAttribute("dir", "ltr");
      });

    document
      .querySelector(".rtl-setting")
      .addEventListener("click", function () {
        document.body.classList.remove("ltr", "rtl", "box-layout");
        document.body.classList.add("rtl");
        document.documentElement.setAttribute("dir", "rtl");
      });

    document
      .querySelector(".box-setting")
      .addEventListener("click", function () {
        document.body.classList.remove("rtl", "ltr");
        document.body.classList.add("box-layout");
        document.documentElement.removeAttribute("dir");
      });
    // COLORFULL SVG
    document
      .querySelector(".colorfull-svg")
      .addEventListener("click", function () {
        const pageSidebar = document.querySelector(".page-sidebar");
        pageSidebar.classList.add("iconcolor-sidebar");
        pageSidebar.setAttribute("data-sidebar-layout", "iconcolor-sidebar");
      });
    // STROKE SVG
    document.querySelectorAll(".default-svg").forEach(function (element) {
      element.addEventListener("click", function () {
        var pageSidebarElements = document.querySelectorAll(".page-sidebar");

        for (var i = 0; i < pageSidebarElements.length; i++) {
          pageSidebarElements[i].setAttribute(
            "data-sidebar-layout",
            "stroke-svg"
          );
          pageSidebarElements[i].classList.remove("iconcolor-sidebar");
        }
      });
    });


// HORIZONTAL SIDEBAR
// Check if the variable is already set in localStorage
var sidebarSetting = localStorage.getItem("sidebarSetting");

// Check the initial value and apply the corresponding class
if (sidebarSetting === "vertical-sidebar") {
  $(".page-wrapper").addClass("compact-wrapper");
  $(".page-wrapper").removeClass("horizontal-sidebar");
} else if (sidebarSetting === "horizontal-sidebar") {
  $(".page-wrapper").addClass("horizontal-sidebar");
  $(".page-wrapper").removeClass("compact-wrapper");
}

// Event handler for the click event on elements with class "vertical-setting"
$(".vertical-setting").click(function () {
  // Update the variable and store it in localStorage
  sidebarSetting = "vertical-sidebar";
  localStorage.setItem("sidebarSetting", sidebarSetting);

  $(".page-wrapper").addClass("compact-wrapper");
  $(".page-wrapper").removeClass("horizontal-sidebar");
  location.reload();
});

// Event handler for the click event on elements with class "horizontal-setting"
$(".horizontal-setting").click(function () {
  // Update the variable and store it in localStorage
  sidebarSetting = "horizontal-sidebar";
  localStorage.setItem("sidebarSetting", sidebarSetting);

  $(".page-wrapper").addClass("horizontal-sidebar");
  $(".page-wrapper").removeClass("compact-wrapper");
});

    // Media query for screens below 1200px
    const mediaQuery = window.matchMedia("(max-width: 1200px)");

    // Function to handle the media query change
    function handleMediaQueryChange(event) {
      if (event.matches) {
        // Apply compact mode when the screen width is below 1200px
        $(".page-wrapper").addClass("compact-wrapper");
        $(".page-wrapper").removeClass("horizontal-sidebar");
      } else {

       // Remove compact mode when the screen width is above 1200px
    if (sidebarSetting === "horizontal-sidebar") {
      $(".page-wrapper").removeClass("compact-wrapper");
      $(".page-wrapper").addClass("horizontal-sidebar");
    }
      }
    }

    // Add a listener to the media query
    mediaQuery.addListener(handleMediaQueryChange);

    // Initial check of the media query when the page loads
    handleMediaQueryChange(mediaQuery);

    // LIGHT/DARK
    $(".light-setting").click(function () {
      $("html").attr("data-theme", "light");
      document.body.classList.add("light");
      document.body.classList.remove("dark");
      document.body.classList.remove("dark-sidebar");
    });

    $(".dark-setting").click(function () {
      $("html").attr("data-theme", "dark");
      document.body.classList.add("dark");
      document.body.classList.remove("light");
      document.body.classList.remove("dark-sidebar");
    });
  });

  // // DARK SIDEBAR
  document.addEventListener("DOMContentLoaded", function () {
    const toggleDarkSidebarButton = document.querySelector(".mix-setting");
    const htmlTag = document.documentElement;

    toggleDarkSidebarButton.addEventListener("click", function () {
      htmlTag.setAttribute("data-theme", "dark-sidebar");
      document.body.classList.remove("dark", "light");
      document.body.classList.add("dark-sidebar");
    });
  });

  // HORIZONTAL SIDEBAR ARROW
  var view = $("#sidebar-menu");
  var move = "500px";
  var leftsideLimit = -500;

  var getMenuWrapperSize = function () {
    return $(".page-sidebar").innerWidth();
  };
  var menuWrapperSize = getMenuWrapperSize();

  if (menuWrapperSize >= "1660") {
    var sliderLimit = -4000;
  } else if (menuWrapperSize >= "1440") {
    var sliderLimit = -4600;
  } else {
    var sliderLimit = -4200;
  }

  $("#left-arrow").addClass("disabled");
  $("#right-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition >= sliderLimit) {
      $("#left-arrow").removeClass("disabled");
      view.stop(false, true).animate(
        {
          marginLeft: "-=" + move,
        },
        {
          duration: 400,
          complete: function () {
            if (parseInt(view.css("marginLeft")) == -4500) {
              $("#right-arrow").addClass("disabled");
            }
          },
        }
      );
      if (currentPosition == sliderLimit) {
        $(this).addClass("disabled");
        console.log("sliderLimit", sliderLimit);
      }
    }
  });

  $("#left-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition < 0) {
      view.stop(false, true).animate(
        {
          marginLeft: "+=" + move,
        },
        {
          duration: 400,
        }
      );
      $("#right-arrow").removeClass("disabled");
      $("#left-arrow").removeClass("disabled");
      if (currentPosition >= leftsideLimit) {
        $(this).addClass("disabled");
      }
    }
  });
})(jQuery);
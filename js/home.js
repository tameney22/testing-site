$(document).ready(function(){
        $("#name").typed({
                strings: ["YOSEPH TAMENE"],
                typeSpeed: 90,
                backDelay: 900,
                loop: false,
                showCursor: false
        });

        $("#hidden-blurbs").typed({
                strings: ["Web Developer", "Software Engineer", "Tech Enthusiast", "Mobile App Developer"],
                typeSpeed: 90,
                startDelay: 1500,
                backDelay: 900,
                loop: true,
                showCursor: false
        });
});

// Menu burger
const button = document.getElementById("burger");
const icon = document.querySelector('.icon');
icon.style.transition = '300ms ease-in-out';
var show = false;
function displayMenu() {
        if (!show) {
                $("#nav-list").css('display', 'block');
                $(".icon").css('transform', 'rotate(-90deg)');
                setTimeout(() => icon.setAttribute('class', 'fas fa-times icon'), 120);
                show = true;
        } else {
                $("#nav-list").css('display', 'none');
                $(".icon").css('transform', 'rotate(0)');
                setTimeout(() => icon.setAttribute('class', 'fas fa-bars icon'), 120);
                show = false;
        }
        
}
  


// Delay the loading by 4 seconds
  window.onload = function() {
            setTimeout(function() {
                // Hide the loader
                document.getElementById('loader').style.display = 'none';
              
            }, 3000); // 4000 milliseconds = 4 seconds
        };
$(document).ready(function () {
    $('.banner-slider').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000, // Slide transition every 2 seconds
        autoplayHoverPause: true, // Pause autoplay on hover (optional)
        nav: false,
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1 // Adjust for smaller screens
            },
            1000: {
                items: 1 // One banner at a time
            }
        }
    });
});
$(document).ready(function () {
    $('.testi-slide').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000, // Slide transition every 2 seconds
        autoplayHoverPause: true, // Pause autoplay on hover (optional)
        nav: false,
        dots:false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3 // Adjust for smaller screens
            },
            1000: {
                items: 3 // One banner at a time
            }
        }
    });
});
// navbarrr js======================================
const navEl = document.querySelector('.navbar');

window.addEventListener('scroll', () => {
    if (window.scrollY >= 56) {
        navEl.classList.add('navbar-scrolled');
    } else if (window.scrollY < 56) {
        navEl.classList.remove('navbar-scrolled');
    }
});

  AOS.init();
  document.getElementById('selected-category-button').addEventListener('click', function() {
    const selectDropdown = document.getElementById('category-select');
    selectDropdown.classList.toggle('visible');
});

document.getElementById('category-select').addEventListener('change', function() {
    const selectedCategory = this.value;
    document.getElementById('selected-category-button').innerHTML = 
        `${selectedCategory} <i class="fa-solid fa-angle-down"></i>`;
    this.classList.remove('visible'); // Hide dropdown after selection
});



 // Check the URL for the "status" parameter
 const urlParams = new URLSearchParams(window.location.search);
 const status = urlParams.get('status');

 if (status === 'success') {
     // Show success popup
     const successModal = new bootstrap.Modal(document.getElementById('popupSuccess'));
     successModal.show();
 } else if (status === 'error') {
     // Show error popup
     const errorModal = new bootstrap.Modal(document.getElementById('popupError'));
     errorModal.show();
 }



var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6761303c49e2fd8dfef95350/1if9q8rjr';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();


  AOS.init();
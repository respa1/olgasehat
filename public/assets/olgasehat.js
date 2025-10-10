// Olga Sehat JavaScript

// Carousel functionality
function initCarousel() {
  const carousel = document.getElementById('carousel');
  const prevBtn = document.getElementById('prev');
  const nextBtn = document.getElementById('next');
  const dots = document.getElementById('dots')?.children;
  if (!carousel || !prevBtn || !nextBtn || !dots) return;
  const totalSlides = carousel.children.length;
  let carouselIndex = 0;

  function updateCarousel(index) {
    if (index < 0) index = totalSlides - 1;
    if (index >= totalSlides) index = 0;
    carouselIndex = index;
    carousel.style.transform = `translateX(-${index * 100}%)`;
    for (let i = 0; i < dots.length; i++) {
      dots[i].classList.toggle('bg-gray-600', i === index);
      dots[i].classList.toggle('bg-gray-300', i !== index);
    }
  }

  prevBtn.addEventListener('click', () => {
    updateCarousel(carouselIndex - 1);
  });

  nextBtn.addEventListener('click', () => {
    updateCarousel(carouselIndex + 1);
  });

  for (let i = 0; i < dots.length; i++) {
    dots[i].addEventListener('click', () => {
      updateCarousel(i);
    });
  }

  // Auto slide carousel
  setInterval(() => {
    updateCarousel(carouselIndex + 1);
  }, 5000);
}

// Testimonial slider
function initTestimonials() {
  const testimonials = document.querySelectorAll('.testimonial-item');
  const counter = document.getElementById('testimonial-counter');
  const prevBtn = document.getElementById('prev-btn');
  const nextBtn = document.getElementById('next-btn');
  if (!testimonials.length || !counter || !prevBtn || !nextBtn) return;
  let testimonialIndex = 0;
  const total = testimonials.length;

  function showTestimonial(index) {
    testimonials.forEach((item, i) => {
      if (i === index) {
        item.style.opacity = '1';
        item.style.pointerEvents = 'auto';
      } else {
        item.style.opacity = '0';
        item.style.pointerEvents = 'none';
      }
    });
    counter.textContent = `${String(index + 1).padStart(2, '0')}/${String(total).padStart(2, '0')}`;
  }

  prevBtn.addEventListener('click', () => {
    testimonialIndex = (testimonialIndex - 1 + total) % total;
    showTestimonial(testimonialIndex);
  });

  nextBtn.addEventListener('click', () => {
    testimonialIndex = (testimonialIndex + 1) % total;
    showTestimonial(testimonialIndex);
  });

  // Initialize
  showTestimonial(testimonialIndex);
}

// Mobile menu toggle
function initMobileMenu() {
  const mobileMenuBtn = document.getElementById("mobileMenuBtn");
  const mobileMenu = document.getElementById("mobileMenu");
  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  }
}

// Cart sidebar toggle
function initCartSidebar() {
  const cartBtns = document.querySelectorAll('button[aria-label="Cart"]');
  const cartSidebar = document.getElementById('cartSidebar');
  const closeCartSidebarBtn = document.getElementById('closeCartSidebar');
  if (!cartSidebar) return;

  cartBtns.forEach(cartBtn => {
    cartBtn.addEventListener('click', () => {
      cartSidebar.classList.toggle('translate-x-full');
    });
  });

  if (closeCartSidebarBtn) {
    closeCartSidebarBtn.addEventListener('click', () => {
      cartSidebar.classList.add('translate-x-full');
    });
  }
}

// Initialize on DOM load
document.addEventListener('DOMContentLoaded', () => {
  initCarousel();
  initTestimonials();
  initMobileMenu();
  initCartSidebar();
});

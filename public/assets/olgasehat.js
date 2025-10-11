// HOME JS //

// DOM elements for Lapangan (Sports Venue) section
const btnPemilikLapangan = document.getElementById('btnPemilikLapangan');
const btnPenyewaLapangan = document.getElementById('btnPenyewaLapangan');
const contentPemilikLapangan = document.getElementById('contentPemilikLapangan');
const contentPenyewaLapangan = document.getElementById('contentPenyewaLapangan');
const imageContainerPemilikLapangan = document.getElementById('imageContainerPemilikLapangan');
const imageContainerPenyewaLapangan = document.getElementById('imageContainerPenyewaLapangan');

// DOM elements for Kesehatan (Health) section - Renamed for uniqueness
const btnPemilikKesehatan = document.getElementById('btnPemilikKesehatan');
const btnPenyewaKesehatan = document.getElementById('btnPenyewaKesehatan');
const contentPemilikKesehatan = document.getElementById('contentPemilikKesehatan');
const contentPenyewaKesehatan = document.getElementById('contentPenyewaKesehatan');
const imageContainerPemilikKesehatan = document.getElementById('imageContainerPemilikKesehatan');
const imageContainerPenyewaKesehatan = document.getElementById('imageContainerPenyewaKesehatan');


// Function to handle tab switching logic
function switchTab(btnActive, btnInactive, contentActive, contentInactive, imageActive, imageInactive) {
  // Activate Button
  btnActive.classList.add('bg-blue-700', 'text-white');
  btnActive.classList.remove('bg-gray-300', 'text-gray-600');
  btnActive.setAttribute('aria-selected', 'true');
  btnActive.setAttribute('tabindex', '0');

  // Deactivate Button
  btnInactive.classList.remove('bg-blue-700', 'text-white');
  btnInactive.classList.add('bg-gray-300', 'text-gray-600');
  btnInactive.setAttribute('aria-selected', 'false');
  btnInactive.setAttribute('tabindex', '-1');

  // Show/Hide Content
  contentActive.classList.remove('hidden');
  contentInactive.classList.add('hidden');

  // Show/Hide Images
  imageActive.classList.remove('hidden');
  imageInactive.classList.add('hidden');
}

// Event Listeners for Lapangan Section
btnPemilikLapangan?.addEventListener('click', () => {
  switchTab(
    btnPemilikLapangan, btnPenyewaLapangan,
    contentPemilikLapangan, contentPenyewaLapangan,
    imageContainerPemilikLapangan, imageContainerPenyewaLapangan
  );
});

btnPenyewaLapangan?.addEventListener('click', () => {
  switchTab(
    btnPenyewaLapangan, btnPemilikLapangan,
    contentPenyewaLapangan, contentPemilikLapangan,
    imageContainerPenyewaLapangan, imageContainerPemilikLapangan
  );
});

// Event Listeners for Kesehatan Section
btnPemilikKesehatan?.addEventListener('click', () => {
  switchTab(
    btnPemilikKesehatan, btnPenyewaKesehatan,
    contentPemilikKesehatan, contentPenyewaKesehatan,
    imageContainerPemilikKesehatan, imageContainerPenyewaKesehatan
  );
});

btnPenyewaKesehatan?.addEventListener('click', () => {
  switchTab(
    btnPenyewaKesehatan, btnPemilikKesehatan,
    contentPenyewaKesehatan, contentPemilikKesehatan,
    imageContainerPenyewaKesehatan, imageContainerPemilikKesehatan
  );
});

// Testimonial Slider Script
const testimonialItems = document.querySelectorAll('.testimonial-item');
const testimonialCounter = document.getElementById('testimonial-counter');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
let currentTestimonial = 0;
const totalTestimonials = testimonialItems.length;

function updateTestimonial(index) {
  testimonialItems.forEach((item, i) => {
    if (i === index) {
      item.classList.remove('opacity-0', 'pointer-events-none');
      item.classList.add('opacity-100');
    } else {
      item.classList.remove('opacity-100');
      item.classList.add('opacity-0', 'pointer-events-none');
    }
  });
  testimonialCounter.textContent = `${(index + 1).toString().padStart(2, '0')}/${totalTestimonials.toString().padStart(2, '0')}`;
}

prevBtn.addEventListener('click', () => {
  currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
  updateTestimonial(currentTestimonial);
});

nextBtn.addEventListener('click', () => {
  currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
  updateTestimonial(currentTestimonial);
});

// Initial update
updateTestimonial(currentTestimonial);

// Carousel functionality
document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.getElementById('carousel');
  const images = carousel.querySelectorAll('img');
  const totalSlides = images.length;
  const prevButton = document.getElementById('prev');
  const nextButton = document.getElementById('next');
  const dotsContainer = document.getElementById('dots');
  let currentIndex = 0;
  let intervalId;
  const slideInterval = 5000; // Interval waktu slide otomatis (5 detik)

  // --- FUNGSI UTAMA UNTUK BERPINDAH SLIDE ---
  function updateCarousel() {
    // Hitung persentase pergeseran
    const offset = -currentIndex * 100;
    carousel.style.transform = `translateX(${offset}%)`;

    // Perbarui tampilan dots
    updateDots();
  }

  function updateDots() {
    // Hapus semua styling aktif
    dotsContainer.querySelectorAll('button').forEach((dot, index) => {
      dot.classList.remove('bg-blue-700');
      dot.classList.add('bg-gray-300');
    });

    // Tambahkan styling aktif pada dot saat ini
    dotsContainer.querySelector(`button[data-index="${currentIndex}"]`).classList.remove('bg-gray-300');
    dotsContainer.querySelector(`button[data-index="${currentIndex}"]`).classList.add('bg-blue-700');
  }

  // --- FUNGSI NAVIGASI MANUAL (Panah dan Dots) ---

  // Tombol Sebelumnya
  prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
    restartAutoSlide();
  });

  // Tombol Berikutnya
  nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateCarousel();
    restartAutoSlide();
  });

  // Dots Navigasi
  dotsContainer.addEventListener('click', (e) => {
    if (e.target.tagName === 'BUTTON' && e.target.dataset.index) {
      currentIndex = parseInt(e.target.dataset.index);
      updateCarousel();
      restartAutoSlide();
    }
  });

  // --- FUNGSI SLIDE OTOMATIS ---

  function startAutoSlide() {
    intervalId = setInterval(() => {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateCarousel();
    }, slideInterval);
  }

  function restartAutoSlide() {
    clearInterval(intervalId);
    startAutoSlide();
  }

  // Inisialisasi: Mulai slide otomatis saat halaman dimuat
  startAutoSlide();
});


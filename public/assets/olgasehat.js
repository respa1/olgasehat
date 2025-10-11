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


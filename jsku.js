// Fungsi untuk navigasi yang halus
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        document.querySelector(targetId).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Fungsi untuk testimonial slider
let currentTestimonial = 0;
const testimonials = document.querySelectorAll('.testimonial-item');
const totalTestimonials = testimonials.length;

function showTestimonial(index) {
    testimonials.forEach((item, i) => {
        item.style.display = (i === index) ? 'block' : 'none';
    });
}

function nextTestimonial() {
    currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
    showTestimonial(currentTestimonial);
}

// Tampilkan testimonial pertama
showTestimonial(currentTestimonial);
setInterval(nextTestimonial, 5000); // Ganti testimonial setiap 5 detik

// Fungsi untuk mengirim formulir
document.querySelector('.newsletter form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = this.querySelector('input[type="email"]').value;
    alert(`Terima kasih telah mendaftar dengan email: ${email}`);
    this.reset(); // Reset formulir setelah pengiriman
});
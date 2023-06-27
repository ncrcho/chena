// Get the header element
const header = document.querySelector('header');

let lastScrollPosition = 0;

// Function to handle the scroll event
function handleScroll() {
  // Get the current scroll position
  const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

  // Check if scrolling down
  if (currentScrollPosition > lastScrollPosition) {
    header.style.opacity = '0'; // Hide the header
  } else {
    header.style.opacity = '1'; // Show the header
  }

  // Update the last scroll position
  lastScrollPosition = currentScrollPosition;
}

// Add scroll event listener
window.addEventListener('scroll', handleScroll);


const reviews = [
  {
    review: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
    name: "John Doe"
  },
  {
    review: "Praesent eu enim nec quam sollicitudin placerat nec sit amet mi.",
    name: "Jane Smith"
  },
  {
    review: "Vivamus vitae finibus orci, vel maximus lorem.",
    name: "David Johnson"
  },
  {
    review: "Nulla vitae est euismod, ullamcorper lectus quis, feugiat quam.",
    name: "Emily Davis"
  }
];

let currentReviewIndex = 0;

function showReview(index) {
  const review = reviews[index];
  const reviewElement = document.querySelector(".customer-review");
  const nameElement = document.querySelector(".customer-name");
  reviewElement.textContent = review.review;
  nameElement.textContent = review.name;
}

function previousReview() {
  currentReviewIndex = (currentReviewIndex - 1 + reviews.length) % reviews.length;
  showReview(currentReviewIndex);
}

function nextReview() {
  currentReviewIndex = (currentReviewIndex + 1) % reviews.length;
  showReview(currentReviewIndex);
}

showReview(currentReviewIndex);
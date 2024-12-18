<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Submit Your Review</h1>
    <form id="reviewForm">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea class="form-control" id="comment" rows="3" placeholder="Write your comment" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div id="successMessage" class="alert alert-success mt-3 d-none">
      Review submitted successfully! You can <a href="http://localhost/site3/site4.php" target="_blank">view all reviews here</a>.
    </div>
  </div>
  <script>
    document.getElementById('reviewForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const comment = document.getElementById('comment').value;

      const reviews = JSON.parse(localStorage.getItem('reviews')) || [];
      reviews.push({ id: reviews.length + 1, name, email, comment });
      localStorage.setItem('reviews', JSON.stringify(reviews));

      document.getElementById('reviewForm').reset();
      const successMessage = document.getElementById('successMessage');
      successMessage.classList.remove('d-none');
    });
  </script>
</body>
</html>

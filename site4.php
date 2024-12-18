<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Review Table</h1>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Review ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="reviewTableBody"></tbody>
    </table>
  </div>
  <script>
    const reviews = JSON.parse(localStorage.getItem('reviews')) || [];
    const tableBody = document.getElementById('reviewTableBody');

    function loadReviews() {
      tableBody.innerHTML = '';
      reviews.forEach((review) => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${review.id}</td>
          <td>${review.name}</td>
          <td>${review.email}</td>
          <td>
            <button class="btn btn-info btn-sm" onclick="viewReview(${review.id})">View</button>
            <button class="btn btn-warning btn-sm" onclick="editReview(${review.id})">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="deleteReview(${review.id})">Delete</button>
          </td>
        `;
        tableBody.appendChild(row);
      });
    }

    function viewReview(id) {
      const review = reviews.find((r) => r.id === id);
      alert(`Name: ${review.name}\nEmail: ${review.email}\nComment: ${review.comment}`);
    }

    function editReview(id) {
      const review = reviews.find((r) => r.id === id);
      if (review) {
        const newName = prompt('Edit Name:', review.name);
        const newEmail = prompt('Edit Email:', review.email);
        const newComment = prompt('Edit Comment:', review.comment);
        if (newName && newEmail && newComment) {
          review.name = newName;
          review.email = newEmail;
          review.comment = newComment;
          localStorage.setItem('reviews', JSON.stringify(reviews));
          loadReviews();
        }
      }
    }

    function deleteReview(id) {
      const index = reviews.findIndex((r) => r.id === id);
      if (index !== -1) {
        reviews.splice(index, 1);
        reviews.forEach((r, i) => (r.id = i + 1)); // Reassign IDs
        localStorage.setItem('reviews', JSON.stringify(reviews));
        loadReviews();
      }
    }

    loadReviews();
  </script>
</body>
</html>

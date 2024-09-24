<!-- resources/views/books/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add a New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add a New Book</h1>

        <!-- Form to create a new book -->
        <form action="{{ route('books.index') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Book Title:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title">
                 <!-- Display validation error for 'name' field -->
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Enter author's name">
                 <!-- Display validation error for 'name' field -->
        @error('author')
            <div class="text-danger">{{ $message }}</div>
        @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>

        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to list</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

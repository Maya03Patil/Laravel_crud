<!-- resources/views/books/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   
   body{
    background-color: 	#cccaf0;
    font-family:'times new roman';
    font-family: 'Montserrat', sans-serif;
        font-weight: 600;
    
   }


    </style>
<body>

<div class="container mt-5">
    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h1 class="mb-4">List of Books</h1>

    <!-- Button to add a new book -->
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add a New Book</a>

    <!-- Table of books -->
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Author</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <!-- Form to delete a book -->
                        <form action="{{ route('books.destroy', ['id' => $book->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-warning btn-sm">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>
<div class="container d-flex justify-content-center mt-5">
    {{ $books->links('pagination::bootstrap-4') }}
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

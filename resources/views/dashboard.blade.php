<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- اضافه کردن بوت‌استرپ برای زیبایی -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- نوار بالای صفحه -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">IT Student Portal</a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- نمایش پیام موفقیت -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- فرم ثبت کتاب جدید -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">Add a New Book</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.store') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Author</label>
                                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pages</label>
                                <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" value="{{ old('pages') }}" required>
                                @error('pages') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- جدول نمایش کتاب‌ها -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">My Books</div>
                    <div class="card-body">
                        @if($books->isEmpty())
                            <p class="text-muted text-center my-3">No books added yet.</p>
                        @else
                            <table class="table table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Pages</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $index => $book)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->pages }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

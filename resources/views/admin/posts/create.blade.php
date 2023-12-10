@extends('admin.master')
@section('title', 'Thêm mới bài viết')
@section('main-content')
    <!-- resources/views/your/create.blade.php -->


    <div class="container">
        <h2>Create New Record</h2>

        <form method="post" action="{{ route('posts.store') }}">
            @csrf

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" required>
            </div>

            <div>
                <label for="summary">Summary:</label>
                <textarea name="summary" required></textarea>
            </div>

            <div>
                <label for="content">Content:</label>
                <textarea name="content" required></textarea>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="text" name="image">
            </div>

            <div>
                <label for="job_typeid">Tác giả</label>
                <input type="number" name="job_typeid" required>
            </div>

            <div>
                <label for="detail_link">Link:</label>
                <input type="text" name="detail_link" required>
            </div>
            <div>
                <label for="detail_link">Địa chỉ:</label>
                <input type="text" name="address" required>
            </div>

            <div>
                <label for="display_order">Display Order:</label>
                <input type="number" name="display_order" required>
            </div>

            <div>
                <label for="post_type">Post Typeid:</label>
                <input type="number" name="post_typeid" required>
            </div>

            <div>
                <label for="authorid">Author ID:</label>
                <input type="number" name="authorid" required>
            </div>

            <div>
                <label for="posting_date">Posting Date:</label>
                <input type="date" name="posting_date" required>
            </div>

            <div>
                <label for="closing_date">Closing Date:</label>
                <input type="date" name="closing_date" required>
            </div>

            <div>
                <label for="status">Status:</label>
                <input type="text" name="status" >
            </div>

            <div>
                <label for="vacancy_count">Vacancy Count:</label>
                <input type="number" name="vacancy_count" required>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection



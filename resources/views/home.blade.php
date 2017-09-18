@extends('layouts.app')

@push('styles')
    <link href="/css/home.css" rel="stylesheet" type="text/css">
@endpush

@section('content')
@if (count($books) === 0)
    <section id="introduction">
        <h2>You don't have any books!</h2>
        <p>Click <a href="{{ route('book.add') }}">here</a> to get started.</p>
    </section>
@endif

<table id="book-table" class="full-width">
    <tbody>
        @foreach ($books as $book)
        <tr id="book-{{ $book->id }}" class="flex-container full-width">
            <td class="flex-item flex-container flex-container-column needs-breathing-room">
                <button onclick="window.location='{{ route('book.update', $book->id) }}';">Edit</button>
                <button onclick="deleteBook({{ $book->id }});">Delete</button>
                <button onclick="moveBookUp({{ $book->id }});">^</button>
                <button onclick="moveBookDown({{ $book->id }});">v</button>
            </td>

            <td class="flex-item image-cell needs-breathing-room">
                <img src="{{ (is_null($book->image_path)) ? '/images/placeholder-cage.png' : $imageHost . $book->image_path }}" alt="Cover Image for {{ $book->title }}">
            </td>

            <td class="flex-item needs-breathing-room">
                <div class="flex-container">
                    <span class="label flex-item">Title:</span>
                    <span id="book-{{ $book->id }}-title" class="content flex-item">{{ $book->title }}</span>
                </div>

                <div class="flex-container">
                    <span class="label flex-item">Author:</span>
                    <span class="content flex-item">{{ $book->author }}</span>
                </div>

                <div class="flex-container">
                    <span class="label flex-item">Publication Date:</span>
                    <span class="content flex-item">sdfsdf<!-- TODO: Add Publication Date --></span>
                </div>

                <div class="flex-container">
                    <span class="label flex-item">ISBN:</span>
                    <span class="content flex-item">{{ $book->isbn }}sdfsdf<span>
                </div>

                <div class="flex-container">
                    <span class="label flex-item">Description:</span>
                    <span class="content flex-item">{{ $book->description }}</span>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

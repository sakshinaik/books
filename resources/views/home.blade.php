@extends('layouts.app')

@push('styles')
    <link href="/css/home.css" rel="stylesheet" type="text/css">
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

@if (count($books) === 0)
    <section id="introduction" class="center">
        <h2>You don't have any books!</h2>
        <p>Click <a href="{{ route('book.add') }}">here</a> to get started.</p>
    </section>
@else
    <form class="center">
        <fieldset class="flex-container">
            <legend>
                Sort Book List
            </legend>

            <div class="flex-container full-width flex-item">
                <label for="sort-field" class="input-label">Field</label>
                <select id="sort-field" class="input-field">
                    <option value="sort_order">Sort Order</option>
                    <option value="author">Author</option>
                    <option value="title">Title</option>
                    <option value="publication_date">Publication Date</option>
                    <option value="isbn">ISBN</option>
                </select>
            </div>

            <div class="flex-container full-width flex-item">
                <label for="sort-direction" class="input-label">Direction</label>
                <select id="sort-direction" class="input-field">
                    <option value="asc">A -> Z</option>
                    <option value="desc">Z -> A</option>
                </select>
            </div>

            <button class="flex-item" onclick="event.preventDefault(); sortIndex();">Sort</button>
        </fieldset>
    </form>
@endif

<section id="book-list">
    @include('book.index')
</section>

@endsection

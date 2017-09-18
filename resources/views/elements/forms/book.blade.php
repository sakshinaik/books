@push('styles')
    <link href="/css/small-forms.css" rel="stylesheet" type="text/css">
    <link href="/css/cover-images.css" rel="stylesheet" type="text/css">
@endpush

<section id="book-form" class="flex-container max-width-1024">
    @isset($book->image_path)
        <div class="flex-item max-width-full">
            <h2 class="center-text">Current Cover Image</h2>
            <img class="cover-image-large" src="https://s3.amazonaws.com/kimberly-technology{{ $book->image_path }}" alt="Book Cover">
        </div>
    @endisset

    {{ Form::model($book, ['route' => ['book.store', $book->id], 'files' => true, 'class' => 'flex-item']) }}
        <fieldset>
            <legend class="center-text">{{ (Route::currentRouteName() === 'book.add') ? 'Add' : 'Update' }} Book</legend>

            <div class="flex-container full-width">
                {{ Form::label('title', 'Book Title', ['class' => 'flex-item center-text input-label']) }}
                @if ($errors->has('title'))
                    <div class="error flex-item">
                        <span>
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    </div>
                @endif
                {{ Form::text('title', null, ['class' => 'flex-item input-field', 'required', 'autofocus']) }}
            </div>

            <div class="flex-container full-width">
                {{ Form::label('author', 'Author', ['class' => 'flex-item center-text input-label']) }}
                @if ($errors->has('author'))
                    <div class="error flex-item">
                        <span>
                            <strong>{{ $errors->first('author') }}</strong>
                        </span>
                    </div>
                @endif
                {{ Form::text('author', null, ['class' => 'flex-item input-field', 'required']) }}
            </div>

            <div class="flex-container full-width">
                {{ Form::label('publication_date', 'Publication Date', ['class' => 'flex-item center-text input-label']) }}
                @if ($errors->has('publication_date'))
                    <div class="error flex-item">
                        <span>
                            <strong>{{ $errors->first('publication_date') }}</strong>
                        </span>
                    </div>
                @endif
                {{ Form::date('publication_date', null, ['class' => 'flex-item input-field']) }}
            </div>

            <div class="flex-container full-width">
                {{ Form::label('isbn', 'ISBN', ['class' => 'flex-item center-text input-label']) }}
                @if ($errors->has('isbn'))
                    <div class="error flex-item">
                        <span>
                            <strong>{{ $errors->first('isbn') }}</strong>
                        </span>
                    </div>
                @endif
                {{ Form::text('isbn', null, ['class' => 'flex-item input-field', 'maxlength' => 13]) }}
            </div>

            <div class="flex-container full-width">
                {{ Form::label('description', 'Description', ['class' => 'flex-item center-text input-label']) }}
                {{ Form::textarea('description', null, ['class' => 'flex-item input-field', 'cols' => 0, 'rows' => 0]) }}
            </div>

            <div class="flex-container full-width">
                {{ Form::label('image', 'Cover Image', ['class' => 'flex-item center-text input-label']) }}
                @if ($errors->has('image'))
                    <div class="error flex-item">
                        <span>
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    </div>
                @endif
                {{ Form::file('image', ['class' => 'flex-item input-field', 'maxlength' => 13]) }}
            </div>

            <div class="flex-item full-width">
                <button type="submit" class="center-horizontal">
                    Save Book
                </button>
            </div>
        </fieldset>
    {{ Form::close() }}
</section>
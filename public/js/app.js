$(document).ajaxStart(function() {
    $(document.body).css({'cursor' : 'wait'});
}).ajaxStop(function() {
    $(document.body).css({'cursor' : 'default'});
});

function sortIndex() {
    let field = $('#sort-field').val();
    let direction = $('#sort-direction').val();

    console.log(`Attempting to sort index on ${field} ${direction}`);

    $.ajax('/book/sort', {
        method: 'get',
        data: `field=${field}&direction=${direction}`,
        success: function(data) {
            $('#book-list').html(data);
            $('.movement').remove();
        },
        error: function() {
            alert('There was an issue sorting your books!');
        }
    })
}

function deleteBook(bookID) {
    console.log("Attempting to delete " + bookID);

    $.ajax('/book/delete/' + bookID, {
        method: 'delete',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            return confirm('Are you sure you want to delete ' + $('#book-' + bookID + '-title').html());
        },
        success: function() {
            $('#book-' + bookID).remove();
        },
        error: function() {
            alert('There was an issue deleting your book!');
        }
    });
}

function moveBook(bookID, n) {
    console.log("Attempting to move book " + bookID + " by " + n + " places");

    $.ajax('book/move/' + bookID, {
        method: 'put',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: "move=" + n,
        success: function() {
            let currentRow = $('#book-' + bookID);
            let movedRow = currentRow;
            for (var i = 0; i < Math.abs(n); i++) {
                currentRow = (n < 0) ? currentRow.prev() : currentRow.next();
            }

            (n < 0) ? movedRow.insertBefore(currentRow) : movedRow.insertAfter(currentRow);
        }
    });
}

function moveBookUp(bookID) {
    moveBook(bookID, -1);
}

function moveBookDown(bookID) {
    moveBook(bookID, 1);
}
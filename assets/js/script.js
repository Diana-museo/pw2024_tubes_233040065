// WITH AJAX JQUERY
// $ = jQuery
$(document).ready(function() {
    // DELETE THE SEARCH BUTTON
    $('#search-button').hide();

    // EVENT WHEN THE KEYWORD HAS BEEN WRITTEN
    $('#keyword').on('keyup', function() {
        $('.loader').show();

        // // AJAX USING LOAD
        // $('#con-table').load('../assets/ajax/movies.php?keyword=' + $('#keyword').val());

        // AJAX USING $.get()
        $.get('../assets/ajax/movies.php?keyword=' + $('#keyword').val(), function(data) {
            $('#con-table').html(data);
            $('.loader').hide();
        });
    });
});


// WITH AJAX JAVASCRIPT 
// FETCH THE ELEMENT
// var keyword = document.getElementById('keyword');
// var searchButton = document.getElementById('search-button');
// var conTable = document.getElementById('con-table');

// searchButton.style.display = "none";
// // ADD EVENT WHEN KEYWORD HAVE BEEN WRITTEN
// keyword.addEventListener('keyup', function() {
//     // MAKE AJAX OBJECT
//     var xhr = new XMLHttpRequest();

//     // CHECK THE READYNESS OF AJAX
//     xhr.onreadystatechange = function() {
//         if(xhr.readyState == 4 && xhr.status == 200) {
//             conTable.innerHTML = xhr.responseText;
//         }
//     }

//     // AJAX EXCECUTION
//     xhr.open('GET', '../assets/ajax/movies.php?keyword=' + keyword.value, true);
//     xhr.send();
// });
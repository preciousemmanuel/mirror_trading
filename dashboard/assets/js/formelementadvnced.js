//select box
var select = document.getElementById('fruit_select');
multi(select, {
    non_selected_header: 'Fruits',
    selected_header: 'Favorite fruits'
});

var select = document.getElementById('fruit_select1');
multi(select, {
    enable_search: true
} );
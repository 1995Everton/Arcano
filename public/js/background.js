$(function() {
    var transition = 40;
    var dots = 12;
    var lgStars = 2;
    var smStars = 3;
    function nJoin(n, markup) {
        var fn = typeof markup == 'function' ?
            markup : e => markup;
        return new Array(n).
        join(' ').
        split(' ').
        map(fn).
        join('');
    }
    // Transition layers
    Array.
    from(document.querySelectorAll(
        '.sky-level')).

    slice(0, -1).
    forEach(layer => {layer.innerHTML = nJoin(transition,'<div></div>');});
});
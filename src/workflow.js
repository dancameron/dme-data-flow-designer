window.addEventListener('load', function () {
    'use strict';

/**
 * Click to add
 */
    const iconAdds = document.getElementsByClassName('dsp-icon-add');

    for (const icon of iconAdds) {
        icon.addEventListener('click', function handleClick(event) {
            console.log(icon.classList)
            if (icon.classList.contains('dsp-icon-added')) {
            console.log('added already')
                return false;
            }

            // Create a copy of it
            var clone = icon.cloneNode(true);

            // Update the ID and add a class
            clone.classList.remove('dsp-icon-add');
            clone.classList.add('dsp-item','draggable');

            // Inject it into the DOM
            var dspColumn = document.querySelector('.div1');
            dspColumn.appendChild(clone);

            // mod classes to clicked icon
            icon.classList.remove('dsp-icon-add');
            icon.classList.add('dsp-icon-added');

            sortDraggable();

            return true;
        });
    }

    sortDraggable();

});

function sortDraggable() {
    console.log('sort start');
      /**
     * Sorting
     */
    var elmItems = Array.prototype.slice.call(document.getElementsByClassName('dsp-item')),
        rect = elmItems[0].getBoundingClientRect(),
        itemHeight = rect.height,
        itemsTop = elmItems.map(function (v, i) {
            return Math.round(rect.top + window.pageYOffset + itemHeight * i);
        }),
        items = [];
    console.log(elmItems);

    function sort(targetItem, top) {
        var curIndex = items.indexOf(targetItem),
            newIndex = itemsTop.indexOf(Math.round(top));
        if (newIndex !== -1 && newIndex !== curIndex) {
            items.splice(newIndex, 0, items.splice(curIndex, 1)[0]);
            items.forEach(function (item, i) {
                if (item !== targetItem) {
                    item.top = itemsTop[i];
                }
            });
        }
    }

    items = elmItems.map(function (elmItem) {
        return new PlainDraggable(elmItem, {
            snap: {
                y: {step: itemHeight},
                side: 'start'
            },
            onDrag: function (moveTo) {
                if (!moveTo.snapped) {
                    return false;
                }
                sort(this, moveTo.top);
                return true;
            }
        });
    });
};


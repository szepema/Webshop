document.querySelectorAll('.dropdown>a').forEach(item => {
    item.addEventListener('mouseenter', event => {
        item.classList.add('show');
        item.setAttribute('ariaExpanded', 'true');
        item.nextElementSibling.setAttribute('data-popper-placement', 'bottom-start');
        item.nextElementSibling.classList.add('show');
    });
});

document.querySelectorAll('.dropdown-menu').forEach(item => {
    item.addEventListener('mouseenter', event => {
        item.classList.add('show');
        item.setAttribute('ariaExpanded', 'true');
        item.nextElementSibling.setAttribute('data-popper-placement', 'bottom-start');
        item.nextElementSibling.classList.add('show');
    });
});

document.querySelectorAll('.dropdown>a').forEach(item => {
    item.addEventListener('mouseleave', event => {
        item.classList.remove('show');
        item.setAttribute('ariaexpanded', 'false');
        item.nextElementSibling.removeAttribute('data-popper-placement');
        item.nextElementSibling.classList.remove('show');

    });
});

document.querySelectorAll('.dropdown-menu').forEach(item => {
    item.addEventListener('mouseleave', event => {
        item.classList.remove('show');
        item.setAttribute('ariaexpanded', 'false');
        item.nextElementSibling.removeAttribute('data-popper-placement');
        item.nextElementSibling.classList.remove('show');

    });
});

const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdownItem => {
  const caret = dropdownItem.querySelector('.caret');
  const menu = dropdownItem.querySelector('.menu');
  const options = dropdownItem.querySelectorAll('.menu li');
  const select = dropdownItem.querySelector('.select');
  const selected = dropdownItem.querySelector('.selected');
  const search = dropdownItem.querySelector('.search');

  select.addEventListener('click', () => {
    select.classList.toggle('select-clicked');
    caret.classList.toggle('caret-rotate');
    menu.classList.toggle('menu-open');

    // Adjust dropdown position
    const rect = menu.getBoundingClientRect();
    if (rect.bottom > window.innerHeight) {
      menu.style.bottom = '100%';
      menu.style.top = 'auto';
    } else {
      menu.style.top = '100%';
      menu.style.bottom = 'auto';
    }
  });

  options.forEach(option => {
    option.addEventListener('click', () => {
      selected.innerText = option.innerText;
      select.classList.remove('select-clicked');
      caret.classList.remove('caret-rotate');
      menu.classList.remove('menu-open');
      search.value = '';

      options.forEach(option => {
        option.classList.remove('active');
      });
      option.classList.add('active');
    });
  });

  search.addEventListener('input', (e) => {
    const filter = e.target.value.toLowerCase();
    options.forEach(option => {
      const text = option.innerText.toLowerCase();
      if (text.includes(filter)) {
        option.style.display = '';
      } else {
        option.style.display = 'none';
      }
    });
  });
});

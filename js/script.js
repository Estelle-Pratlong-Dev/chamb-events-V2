// ====================== MENU MOBILE ===============================

const menu = document.querySelector('.menu');
const navigation = document.querySelector('#navigation');

if (menu && navigation) {
  menu.addEventListener('click', () => {
    const open = navigation.classList.toggle('open');
    menu.setAttribute('aria-expanded', String(open));
    menu.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
  });

  // Referme le menu après la sélection d’un lien.
  navigation.addEventListener('click', event => {
    if (event.target.closest('a')) {
      navigation.classList.remove('open');
      menu.setAttribute('aria-expanded', 'false');
      menu.setAttribute('aria-label', 'Ouvrir le menu');
    }
  });
}

// ====================== FERMETURE DES DIALOGUES ====================

// Les boutons communs ferment le dialogue auquel ils appartiennent.
document.querySelectorAll('dialog .close').forEach(button => {
  button.addEventListener('click', () => button.closest('dialog').close());
});

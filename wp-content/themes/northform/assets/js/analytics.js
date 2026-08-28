(function () {
  'use strict';
  function event(name, parameters) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push(Object.assign({ event: name }, parameters || {}));
  }
  var query = new URLSearchParams(window.location.search);
  if (query.get('contact') === 'success') {
    event('generate_lead', { form_name: 'project_enquiry' });
    query.delete('contact');
    var clean = window.location.pathname + (query.toString() ? '?' + query.toString() : '') + window.location.hash;
    window.history.replaceState({}, document.title, clean);
  }
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="mailto:"],a[href^="tel:"]');
    if (link) event('contact_intent', { contact_method: link.href.split(':')[0] });
  });
  var form = document.querySelector('[data-contact-form]');
  if (form) form.addEventListener('submit', function () { event('form_submit', { form_name: 'project_enquiry' }); });
}());

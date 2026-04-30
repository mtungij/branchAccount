const CACHE_NAME = 'loan-pocket-v3';
const ASSETS_TO_CACHE = [
  '/',
  '/assets/img/logo-192.png',
  '/assets/img/logo-512.png',
  '/public/css/output.css',
  // Add other assets you want cached here
];

self.addEventListener('install', event => {
  console.log('Service Worker Installed');
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => cache.addAll(ASSETS_TO_CACHE))
  );
});

self.addEventListener('activate', event => {
  console.log('Service Worker Activated');
  event.waitUntil(
    caches.keys().then(keys =>
      Promise.all(
        keys.filter(key => key !== CACHE_NAME)
            .map(key => caches.delete(key))
      )
    )
  );
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(cachedResponse => {
      return cachedResponse || fetch(event.request);
    })
  );
});

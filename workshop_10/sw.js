self.addEventListener("install", e => {
	console.log('Installing WebComputing...');
	e.waitUntil(
		caches.open("static").then(cache => {
			return cache.addAll(["./", "./assets/images/logo192.png", "./assets/images/logo512.png", "./assets/js/validation.js", "./../assets/css/bootstrap/bootstrap.min.css"]);
		})
	)
});

self.addEventListener("fetch", e => {
	console.log('Fetching: '+e.request.url);
	e.respondWith(
		caches.match(e.request).then(response => {
			return response || fetch(e.request);
		})
	)
});
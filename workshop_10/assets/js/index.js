if("serviceWorker" in navigator){ // navigator - browser details
	navigator.serviceWorker.register("./sw.js").then(registration => {
		console.log('Service worker registered.');
		console.log(registration);
	}).catch(error => {
		console.log('Service worker registration failed.');
		console.log(error);
	})
}
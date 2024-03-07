setInterval(function() {
	switch (document.title.substring(document.title.length-2)) {
		case '. ': case ' (': case '(D': case 'DE': case 'EB': case 'BU': case 'UG': case 'G)':
			document.title = document.title.substring(0, document.title.length - 1);
	}
}, 266);
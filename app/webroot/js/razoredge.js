function RazorEdge() {
	this.execute = function() {
		var destination = document.getElementById('peculiar');
		var label = document.createElement('div');
		label.innerHTML = 'Peculiar';
		destination.parentNode.insertBefore(label, destination);
	}
}

function JsonGetter() {
	this.execute = function(table, callback) {
		var accessor = new XMLHttpRequest();
		accessor.open('GET', "https://razor-edge.net/cakephp-2.4.4/" + table + "/doListByJson", true);
		accessor.onreadystatechange = function() {
			if (accessor.readyState == 4 && accessor.status == 200) {
				var json = JSON.parse(accessor.responseText);
				callback(json);
			}
		}
		accessor.send(null);
	}
}

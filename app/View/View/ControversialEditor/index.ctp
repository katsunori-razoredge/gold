<?php echo $this->Html->script('razoredge', array('inline' => false)); ?>
<script>
	var rootElement;
	var form;
	var jsonGetter;
	var element;
	
	window.onload = function() {
		rootElement = document.getElementById('content');
		form = document.createElement('form');
		form.action = 'controversial_editor/insert';
		form.method = 'post';
		var button = document.createElement('input');
		button.type = 'submit';
		button.value = 'trigger';
		form.appendChild(button);
		
		rootElement.appendChild(form);
		
		
		
		var accessor = new XMLHttpRequest();
		accessor.open('GET', "https://razor-edge.net/cakephp-2.4.4/peculiar/doListByJson", true);
		accessor.onreadystatechange = function() {
			if (accessor.readyState == 4 && accessor.status == 200) {
				
				var json = JSON.parse(accessor.responseText);
				
				
				var comboBox = document.createElement('select');
				comboBox.id = 'peculiar';
				comboBox.name = 'peculiar_id';
				var item;
				for (var i = 0; i <= json.length - 1; i++) {
					item = document.createElement('option');
					item.value = json[i]._id;
					item.innerHTML = json[i].ingredient;
					comboBox.appendChild(item);
				}
				form.appendChild(comboBox);
				
				var object = new RazorEdge();
				object.execute();
				
			}
		}
		accessor.send(null);
		
		jsonGetter = new JsonGetter();
		jsonGetter.execute('provoker', 
			function(json) {
				var comboBox = document.createElement('select');
				comboBox.id = 'provoker';
				comboBox.name = 'provoker_id';
				var item;
				for (var i = 0; i <= json.length - 1; i++) {
					item = document.createElement('option');
					item.value = json[i]._id;
					item.innerHTML = json[i].ingredient;
					comboBox.appendChild(item);
				}
				form.appendChild(comboBox);
//				comboBox.parentNode.insertBefore(
			}
		);
		
	}
</script>

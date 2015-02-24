(function() {
	tinymce.PluginManager.add('blank_button', function( editor, url ) {
		editor.addButton( 'blank_button', {
			text: 'Button',
			icon: false,
			onclick: function() {
				editor.windowManager.open( {
					title: 'Insert button text',
					body: [{
						type: 'textbox',
						name: 'title',
						label: 'Button text'
					}],
					onsubmit: function( e ) {
						editor.insertContent( '<a href="http://" class="btn">' + e.data.title + '</a>');
					}
				});
			}
		});
	});
})();
( function( api ) {

	// Extends our custom "house-cleaning" section.
	api.sectionConstructor['house-cleaning'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
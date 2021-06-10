( function() {
  CKEDITOR.plugins.liststyle = {
    requires: 'dialog,contextmenu',
    init: function( editor ) {
      if ( editor.blockless )
        return;

      var def, cmd;

      def = new CKEDITOR.dialogCommand( 'numberedListStyle', {
        requiredContent: 'ol',
        allowedContent: 'ol',
      } );
      cmd = editor.addCommand( 'numberedListStyle', def );
      editor.addFeature( cmd );
      CKEDITOR.dialog.add( 'numberedListStyle', this.path + 'dialogs/liststyle.js' );

      def = new CKEDITOR.dialogCommand( 'bulletedListStyle', {
        requiredContent: 'ul',
        allowedContent: 'ul',
      } );
      cmd = editor.addCommand( 'bulletedListStyle', def );
      editor.addFeature( cmd );
      CKEDITOR.dialog.add( 'bulletedListStyle', this.path + 'dialogs/liststyle.js' );

      //Register map group;
      editor.addMenuGroup( 'list', 108 );

      editor.addMenuItems( {
        numberedlist: {
          label: 'Numbered List Properties',
          group: 'list',
          command: 'numberedListStyle'
        },
        bulletedlist: {
          label: 'Bulleted List Properties',
          group: 'list',
          command: 'bulletedListStyle'
        }
      } );

      editor.contextMenu.addListener( function( element ) {
        if ( !element || element.isReadOnly() )
          return null;

        while ( element ) {
          var name = element.getName();
          if ( name == 'ol' )
            return { numberedlist: CKEDITOR.TRISTATE_OFF };
          else if ( name == 'ul' )
            return { bulletedlist: CKEDITOR.TRISTATE_OFF };

          element = element.getParent();
        }
        return null;
      } );
    },

  };

  CKEDITOR.plugins.add( 'liststyle', CKEDITOR.plugins.liststyle );
} )();

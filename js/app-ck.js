jQuery(document).ready( function() {

     
     
     /**
      * Creates a table of contents based off the heading structure of the current document
      * Creates an unordered list of items, each of which have an anchor linking to it's 
      * corresponding heading, and a span which contains the heading number
      * 
      * since 1.0
      */
      
     var headings       = jQuery('h1, h2, h3, h4, h5, h6'),
         ulContainer    = document.createElement('ul'),
         toc            = jQuery('#secondary').append(ulContainer),
         sectionNumbers = [0,0,0,0,0,0];
         
     headings.each( function( key, heading ) {
          
          level = parseInt( heading.tagName.charAt(1) );
          
          // incrememnt the current level
          sectionNumbers[level-1]++;
          
          // set numbers after current level to 0
          for( var i = level; i < 6; i++ ) {
               sectionNumbers[i] = 0;
          }
          
          // slice off any integers after the current level
          // join with a period
          sectionNumber       = sectionNumbers.slice(0, level).join('.');
          sectionNumberDashed = sectionNumbers.slice(0, level).join('-');          
          
          // Add ID & class to heading 
          // format eg. "toc-1-2"
          heading.setAttribute( 'id', 'toc-' + sectionNumberDashed );
          heading.setAttribute( 'class', 'toc-heading' );
                    
          // create elements which we'll use to create our 
          // nav list items
          sectionSpan           = document.createElement('span');
          sectionAnchor         = document.createElement('a');
          sectionListItem       = document.createElement('li');
                    
          sectionSpan.innerHTML = sectionNumber;
          
          // Setup the anchor elements attributes
          sectionAnchor.href      = '#toc-' + sectionNumberDashed;
          sectionAnchor.innerHTML = heading.innerHTML;
          sectionAnchor.insertBefore( sectionSpan, sectionAnchor.firstChild );

          // Setup the list items attributes and 
          // append all of our previous stuff
          sectionListItem.setAttribute( 'class', 'toc level-' + level );
          sectionListItem.appendChild( sectionAnchor );
          
          ulContainer.appendChild( sectionListItem );          
                   
     });

     
     
     /**
      * Used to scroll Table of Contents along with user scroll
      * 
      *
      * since 1.0
      */
      ( function() {
          $window    = jQuery(window);
          $secondary = jQuery('#secondary');
          
          $window.on( 'scroll', function() {
               
               // Find scroll coordinates of window, and set #secondary's marginTop property
               posY = $window.scrollTop();
               $secondary.css({
                    marginTop: posY
               });           
          });
      })();   
});
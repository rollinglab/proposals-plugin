$(document).ready( function() {
     
//     var headings = document.querySelectorAll("h1,h2,h3,h4,h5,h6");
//     console.log(headings);

     var headings       = $('h1, h2, h3, h4, h5, h6'),
         toc            = $('#secondary'),
         ulContainer    = document.createElement('ul');
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
          
          // To Do: append to #secondary
          sectionLinkAnchor           = document.createElement('a');
          sectionLinkAnchor.href      = 'toc-' + sectionNumberDashed;
          sectionLinkAnchor.innerHTML = sectionNumber + ' ' + heading.innerHTML;

          toc.append(sectionLinkAnchor);
          
          // Add ID & class to heading 
          // format eg. "toc-1-2"
          heading.setAttribute( 'id', 'toc-' + sectionNumberDashed );
          heading.setAttribute( 'class', 'toc-heading' );          
          
     });          
});
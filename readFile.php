<html>

   <head>
      <title>ReadFile</title>
   </head>
   
   <body>
      
      <?php
         $filename = "test.txt";
		 $file = fopen( $filename, "a+" );
         if( $file == false ) {
            echo ( "ERR!" );
            exit();
         }
	
		$filesize = filesize( $filename );
		$filetext = fread( $file, $filesize );
		$data = "Append new line ...  \n";
		fwrite($file, $data);
		fclose( $file );
		
 
        echo ( "Kích cỡ của file: $filesize bytes" );
        echo ( "Nội dung của file: <br>" );
        echo ( "<pre>$filetext</pre>" );
		var_dump($filetext);
      ?>
      
   </body>
</html>
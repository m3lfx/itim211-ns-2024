<!DOCTYPE html PUBLIC
     "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html>
 <head>
 <title>Listing 10.4 An HTML Form with a 'select' Element</title>
 </head>
 <body>
 <div>
 <form action="test2.php" method="POST">
 <p><input type="text" name="user" /></p>
 <p>
 <textarea name="address" rows="5" cols="40">
</textarea>
 </p>
 <p>
 <select name="products[]" multiple="multiple">
 <option>Sonic Screwdriver</option>
 <option>Tricorder</option>
 <option>ORAC AI</option>
 <option>HAL 2000</option>
 </select>
 </p>
 <p><input type="submit" value="hit it!" /></p>
 </form>
 </div>
 </body>
</html>

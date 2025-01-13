<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact Response</title>
  </head>
  <body>
    <h1>Antwoord op je contactformulier</h1>
    <p>Hallo,</p>
      <p>Je stuurde het volgende bericht: {{ $contact->message }}</p>
    <p>De admin heeft geantwoord met:</p>
    <p>{{ $contact->response }}</p>
  </body>
 </html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Formulier</title>
 </head>
  <body>
    <h1>Nieuw Contact Formulier</h1>
      <p>Naam: {{ $contact->name }}</p>
      <p>Email: {{ $contact->email }}</p>
      <p>Message: {{ $contact->message }}</p>
</body>
</html>
<!DOCTYPE html>
<html>
  <head>
    <title>Email de vérification</title>
  </head>
  <body>
    <h2>Bienvenue M/Mme {{$user->name}}</h2>
    <br/>
     Vous recevez cet mail parce que qu'un compte vous a été créé sur l'application REQUEST MANAGER.
    <br/>
     L'adresse email renseignée à la création de votre compte est : {{$user->email}} . 
    <br/>
     Nous vous invitons donc à un changement de votre mot de passe afin qu'il vous soit confidentiel et personnel.
     <br/>
     Veuillez donc cliquer sur le lien ci-dessous pour la vérification de votre compte et procéder au changement de mot de passe. 
    <br/>
    <a href="{{route('verif_account', $user->verifyUser->token)}}">Valider mon compte</a>

    <p>Merci pour votre confirmation.</p>
  </body>
</html>
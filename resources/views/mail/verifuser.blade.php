<!DOCTYPE html>
<html>
  <head>
    <title>Email de vérification</title>
  </head>
  <body>
    <h2>Bienvenue M/Mme {{$user->name}}</h2>
    <br/>
     Vous recevez cet mail parce que vous souhaiterez procéder au changement de votre mot de passe.
    <br/>
     L'adresse email que vous avez renseigner est : {{$user->email}} .
     <br/>
     Veuillez donc cliquer sur le lien ci-dessous pour la vérification de votre compte . 
    <br/>
    <a href="{{route('verif_token', $user->token)}}">Vérifier mon adresse email</a>

    <p>Merci pour votre confirmation.</p>
  </body>
</html>
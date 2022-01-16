<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container" style="background-color: #edf0f4;">
    <div style="margin:30px auto;text-align:center"><div class="adM">
        </div><a>
            <img src="https://h2c-africa.com/~h2cafrica/public//home/assets/h2c-img/logo.png" alt="H2C-Africa-logo" class="CToWUd" style="width: 115px;">
        </a>
    </div>
    <div style="width:524px;margin:0 auto;font-size:18px;background:#fff;border-top:3px solid #fea01e;padding:50px">
        <div>
            <div style="margin-bottom:20px">
                <h4>Chère/Cher &nbsp; {{$user_name}}<br></h4>
                <p>
                    Vous recevez ce message car vous avez demandé la réinitialisation de votre mot de passe sur
                    <span class="il">Ecom</span>.
                    Veuillez suivre ce lien pour créer un nouveau mot de passe:
                </p>
                <div>
                    <a href="{{route('user.getResetPassword', $reset_code)}}" style="background-color:green;border:none;color:white;padding:10px 35px;
                    text-align:center;border-radius:12px;text-decoration:none;display:inline-block;font-size:16px;
                    margin:5px 90px" target="_blank">
                        Réinitialiser votre mot de passe!</a>
                </div>
                <p>
                    Ignorez ce message si vous n'avez pas demander de modifier/réinitialiser votre mot de passe.
                </p>
            </div>
            <hr>
            <div>
                Cordialement,<br>
                L'équipe  <span class="il"><a href="https://meda.ci/">ECOM</a></span>
                Téléphone:  (+225) 07 77 95 54 18
            </div>

            <div style="margin:20px 0px">
                <span>Notez que le lien de réinitialisation du mot de passe est valide uniquement pendant 10 minutes.</span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
